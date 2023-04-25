<?php

namespace App\Classes;

use Request;
use App\UserToken;

class Token
{
    public static function generate($user_id, $device_id, $type, $database = null)
    {
        $done = false;
        $ip_address = Request::ip();
        $old_tokens = [];

        if(!empty($database)){
            $user_token = UserToken::on($database)->firstOrNew(['user_id' => $user_id, 'device_id' => $device_id]);
        }else{
            $user_token = UserToken::firstOrNew(['user_id' => $user_id, 'device_id' => $device_id]);
            $user_token->type = $type;
        }

        do {
            $token = str_random(128);

            if (in_array($token, $old_tokens))
                continue;

            if ($user_token->exists) {
                $user_token->token = $token;
                $user_token->last_ip = $ip_address;

            } else {
                $user_token->token = $token;
                $user_token->ip = $ip_address;
                $user_token->last_ip = $ip_address;
            }

            if ($user_token->save())
                $done = true;

        } while (!$done);

        return $token;
    }

    public static function remove($user_id, $device_id)
    {
        $user_token = UserToken::where('user_id', $user_id)
            ->where('device_id', '!=', $device_id)
            ->update(['token' => null]);

        if ($user_token) {
            return true;
        } else {
            return false;
        }
    }
}
