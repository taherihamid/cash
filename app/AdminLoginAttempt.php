<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLoginAttempt extends Model
{
    protected $fillable = ['email', 'password', 'header', 'reason', 'ip'];

}
