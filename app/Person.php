<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class Person extends Authenticatable
{
    protected $guarded = [];
    const SPECIAL       = 1;
    const NOT_SPECIAL   = 0;
    const SLIDER_COUNT  = 4;

    protected $table = 'person';
    public $timestamps = false;
    protected $primaryKey = 'PersonID';


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

}
