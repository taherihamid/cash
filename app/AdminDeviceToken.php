<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDeviceToken extends Model
{
    protected $fillable = ['token_id', 'reg_id', 'type'];

    const ANDROID = 1;
    const IOS = 2;
    const WEB = 3;

    public function userToken()
    {
        return $this->belongsTo(UserToken::class);
    }
}
