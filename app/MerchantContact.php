<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class MerchantContact extends Model
{
     use Notifiable;

    protected $guard = 'merchant';
    const IN_PROGRESS = 0;
    const HAS_RESPONSE = 1;

    protected $table = 'merchant_contact_requests';


    protected $fillable = ['body','status','response','merchant_id'];
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
}
