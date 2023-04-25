<?php

namespace App;

use App\Traits\Active;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Active;

    const MTN_TYPE     = 1;
    const MCI_TYPE     = 2;
    const RIGHTEL_TYPE = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'active',
        'remember_token',
        'email_verified_at',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function getUserImage(){
        if(!empty($this->attributes['image'])&& !empty($this->attributes['image']['image_file_name'])){
              return env('APP_URL') . '/uploads/volunteer-images/'. $this->attributes['image']['image_file_name'];
        }else{
            return null;
        }
    }*/

}
