<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class AgentTop extends Model
{
     use Notifiable;

    protected $guard = 'agent';
    const IN_PROGRESS = 0;
    const PAID = 1;
    const IGNORED = 2;
    protected $table = 'agent_top_requests';


    protected $fillable = ['requested_amount','status','agent_id','tracking_number'];

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
    public function agent()
    {
        return $this->belongsTo('App\Agent', 'agent_id');
    }
}
