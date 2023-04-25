<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class Invoice extends Model
{
    protected $guarded = [];
    const Pending_Cash_Payment = 0;
    const Amount_Received   = 1;


    protected $table = 'invoices';
    public $timestamps = false;
    protected $fillable = array('invoice_no','order_date','description','amount_to_pay',
        'order_status','valid_until','included_tax','merchant_id','agent_id');


    protected $hidden = [
        'creator_ip',
        'updater_ip',
        'deleter_ip',
        'creator_id',
        'updater_id',
        'deleter_id',
        'deleted_at',
    ];

    public function agents()
    {
        return $this->belongsTo(Agent::class, 'agent_id');

    }
    public function merchants()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');

    }
}
