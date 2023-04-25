<?php

namespace App\Classes;


class MyClass
{

    public static function get_user_data($user){
        $user->gender;
        $user->living_area;
        $user->religion;
        $user->cult;
        $user->birth_state;
        $user->physical_condition;
        $user->military_service_status;
        $user->diploma;
        $user->quota;
        $user->provincial_diploma;
        $user->image;

        return $user;
    }

}
