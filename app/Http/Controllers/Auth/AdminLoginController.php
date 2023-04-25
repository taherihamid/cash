<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Classes\Log;
use Illuminate\Support\Facades\Hash;
use Route;

class AdminLoginController extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {

        return view('auth.admins.login');

    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

//        dd('test');
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if (Auth::guard('admin')->user()) {
                // if successful, then redirect to their intended location
                Log::adminAttemptLogin($request, LOGIN_SUCCESS, trans('ui.text.logged_in'), false);

                return redirect()->intended(route('admin.dashboard'));
            } else {

                Auth::guard('admin')->logout();
                Log::adminAttemptLogin($request, LOGIN_TRY, trans('ui.text.tried_to_login'), false);
                return redirect()->back();
            }
        } else {
            dd('test1');
            (Admin::where('email', $request->email)->exists()) ?
                Log::adminAttemptLogin($request, LOGIN_FAILED, trans('ui.text.password_was_wrong'))
                :
                Log::adminAttemptLogin($request, LOGIN_404, trans('ui.text.email_not_found'));
        }


        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/dashboard');
    }
}
