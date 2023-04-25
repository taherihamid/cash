<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Response;
use App\Classes\SSO;
use App\Person;
use App\PersonContact;
use App\Scopes\ActiveScope;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Kavenegar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    const VERIFY_CODE_VALIDATE_TIME = 100;
    const HTTP_UNPROCESSABLE_ENTITY = 422;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:person');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.sso_register');
    }

    public function showPreRegistrationForm()
    {
        return view('auth.sso_pre_register');
    }

    public function getPhone(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => [
                'required'
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(trans('messages.unknown_error'));
        } else {

            $phone = setClearPhone($request->input('phone'), 0);

            $expire = Carbon::now()->addSeconds(self::VERIFY_CODE_VALIDATE_TIME);
            $canSendVerifyCode = true;
            $type = Session::get('person_type');
            $melli_code = Session::get('melli_code');

            if ($type == 'legal') {
                $person = Person::where('companyNationalCode', $melli_code)->first();
                $msisdn = PersonContact::where('personIdRef', $person->PersonID)->where('contactMobile', $phone)->first();

            } else {
                $person = Person::where('nationalCode', $melli_code)->first();
                $msisdn = $person->mobile;
            }

            if ($person->verification_expire) {
                try {
                    $now = Carbon::now();
                    $verifyCodeSentAt = Carbon::createFromFormat('Y-m-d H:i:s', $person->verification_expire, 'UTC');

                    $verifyCodeSentAtDifference = $now->diffInSeconds($verifyCodeSentAt, false);

                    if ($verifyCodeSentAtDifference > 0) {
                        $canSendVerifyCode = false;
                    }
                } catch (Exception $e) {
                    // do nothing
                }
            }
            if ($canSendVerifyCode) {
                $code = rand(1000, 9999);

                if ($person->verified) {

                    try {
                        $receptor = $msisdn;
                        $token = $code;
                        $token2 = "";
                        $token3 = "";
                        $template = "verify";
                        $type = "sms";//sms | call
//                        $api = new Kavenegar\KavenegarApi("4E6436727765726F645A39526E572F62766567497770637859416E7651775275");
//                        $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);

//                        if ($result[0]->status) {
                        if (true) {
                            $person->verification_expire = $expire;
                            $person->sso_token = $code;
                            $person->save();
                            return view('auth.sso_code_register', compact('phone', 'melli_code'));
                        }
                    } catch (ApiException $e) {
                        echo $e->errorMessage();
                    } catch (HttpException $e) {
                        echo $e->errorMessage();
                    }
                } else {

                    return view('auth.sso_code_register', compact('phone', 'melli_code'))
                        ->withErrors(trans('messages.deactivated'));
                }
            } else {
                return view('auth.sso_code_register', compact('phone', 'melli_code'))
                    ->withErrors(trans('messages.wait_until_expire'));

            }
        }

    }

    public function getMelliCode(Request $request)
    {

        $phone = [];
        $melli_code = $request->melli_code;
        $type = $request->person_type;
        if ($type == 'legal') {
            $person = Person::where('companyNationalCode', $melli_code)->first();
            $phones = PersonContact::where('personIdRef', $person->PersonID)->get();
            $phones->each(function ($item, $key) {

                $new_phone = $this->setClearPhone($item->contactMobile);

                $item->where('contactID', $item->contactID)->update(['contactMobile' => $new_phone]);
            });

            $phone = $phones->pluck('contactMobile')->filter();
        } else {
            $person = Person::where('nationalCode', $melli_code)->first();
            $phone[] = $person->mobile;
        }
        Session::put('person_type', $type);
        Session::put('melli_code', $melli_code);
        return view('auth.select_phone', compact('phone', 'melli_code', 'type'));
    }

    public function confirmCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(trans('messages.unknown_error'));
        } else {
            $code = $request->code;
            $phone = $request->phone;
            $type = Session::get('person_type');
            $melli_code = Session::get('melli_code');

            if ($type == 'legal') {
                $person = Person::where('companyNationalCode', $melli_code)->first();
                $person_contact = PersonContact::where('personIdRef', $person->PersonID)->where('contactMobile', $phone)->first();
                $person_code = $person_contact->sso_token;

            } else {
                $person = Person::where('nationalCode', $melli_code)->first();
                $person_code = $person->sso_token;
            }
            if ($code == $person_code){
//                auth()->loginUsingId($person->PersonID);
                Auth::guard('person')->loginUsingId($person->PersonID);
//                Auth::loginUsingId($person->PersonID);

                return redirect()->route('user.dashboard');


            }
            else{
                dd('code is wrong');
            }

        }
    }

    function setClearPhone($number, $phone_code = '')
    {
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

        if (preg_match("/^\+?0*(?:91-)?\K(?:91)?[6-9][0-9]{9}$/", $number)) {
            // $phone is valid

            return $number;
        }
    }

}
