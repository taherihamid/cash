<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Notifications\ResetPasswordAgent;

class Agent extends Authenticatable
{
     use Notifiable;
//    protected $guarded = [];
    protected $guard = 'agent';
    const PERCENT_TYPE       = 1;
    const AMOUNT_TYPE        = 0;
    const NEW_STATUS = 0;
    const APPROVED_STATUS = 1;
    const PROCESSING_STATUS = 2;
    const REJECTED_STATUS = 3;

    const ACTIVITY_ACTIVE       = 1;
    const ACTIVITY_BLOCK       = 0;

    protected $table = 'agents';
    public $timestamps = false;

    protected $fillable = array('full_name','phone','email','business','business_detail',
        'IBAN','credit_limit','commission','commission_type','password','personal_id','wallet','cash_out');

    protected $hidden = [
        'creator_ip',
        'updater_ip',
        'deleter_ip',
        'creator_id',
        'updater_id',
        'deleter_id',
        'deleted_at',
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        return static::addGlobalScope(new ActiveScope());
//    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordAgent($token));
    }
}
