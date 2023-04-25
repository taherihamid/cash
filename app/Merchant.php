<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class Merchant extends Authenticatable
{

    use Notifiable;
    const NEW_STATUS = 0;
    const APPROVED_STATUS = 1;
    const PROCESSING_STATUS = 2;
    const REJECTED_STATUS = 3;
    protected $guarded = [];

    protected $table = 'merchants';

    protected $fillable = ['full_name','phone','email','business','wallet','api_key','cash_out','business_detail', 'IBAN','password','personal_id','status'];
    protected $hidden = [
        'creator_ip',
        'updater_ip',
        'deleter_ip',
        'creator_id',
        'updater_id',
        'deleter_id',
        'deleted_at',
    ];


    public function getPublishedDateAttribute($value)
    {
        return trim($value);
    }
//    protected static function boot()
//    {
//        parent::boot();
//
//        return static::addGlobalScope(new ActiveScope());
//    }
}
