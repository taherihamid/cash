<?php
namespace App\Classes;



use App\AdminLoginAttempt;

class Log
{
    public static function adminAttemptLogin($request, $header, $reason, $save_password = true)
    {
        AdminLoginAttempt::create([
            'email' => $request->email,
//            (!$save_password) ?: 'password' => $request->password,
            'header' => $header,
            'reason' => $reason,
            'ip' => request()->ip()
        ]);
    }


    public static function access_denied($name)
    {
        return $name;
    }

}
