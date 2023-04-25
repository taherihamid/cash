<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class MerchantCash extends Model
{

    use Notifiable;
    const IN_PROGRESS = 0;
    const PAID = 1;
    const IGNORED = 2;

    protected $guarded = 'merchant';

    protected $table = 'merchant_cash_requests';

    protected $fillable = ['requested_amount','status','merchant_id'];
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
    public function merchant()
    {
        return $this->belongsTo('App\Merchant', 'merchant_id');
    }
}
