<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Event;
use App\Events\Registered;

/**
 * @OA\Post(
 * path="/login",
 * summary="Sign in",
 * description="Login by email, password",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *       @OA\Property(property="persistent", type="boolean", example="true"),
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/userPanel';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'agentLogout']);
       $this->middleware('guest:agent')->except('agentLogout');
    }

    public function agentLogout()
    {
        Auth::guard('agent')->logout();

        return redirect('/');
    }

    public function personLogout()
    {
//        dd('person logout');
        Auth::guard('person')->logout();

        return redirect('/');
    }

    public function showLoginForm()
    {


        return view('auth.agent.login');

    }

    public function login(Request $request)
    {
        if (Auth::guard('agent')->attempt(['personal_id' => $request->personal_id, 'password' => $request->password], $request->get('remember'))) {

            return redirect(route('agent.dashboard'));
        }

        return back()->withInput($request->only('personal_id', 'remember'));
    }
}
