<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Agent;
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
       $this->middleware('guest:agent');
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
            'full_name' => 'required|max:255',
            'phone' => 'required',
            'business' => 'required|max:255',
            'business_detail' => 'required',

            'credit_limit' => 'required',
            'email' => 'required|email|max:255|unique:agents',
            // 'password' => 'required|min:6|confirmed',
            // 'password' => 'required|min:6',
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
        return Agent::create([
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'business' => $data['business'],
            'business_detail' => $data['business_detail'],
            'credit_limit' => $data['credit_limit'],
            'email' => $data['email'],

        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        return redirect(route('home'));
    }

    public function showRegistrationForm()
    {

        return view('auth.agent.register');
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
