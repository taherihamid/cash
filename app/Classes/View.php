<?php

namespace App\Classes;


class View
{
    public static function dashboard($path, $variables)
    {
//        $variables = array_slice(func_get_args(), 1);

        return view('dashboard.' . env('ADMIN_DASHBOARD_NAME') . '.' . func_get_args()[0], compact($variables));
    }
}
