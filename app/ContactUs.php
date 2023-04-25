<?php

namespace App;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class ContactUs extends Model
{
    use Cacheable, SoftDeletes;

    protected $hidden = [
        'creator_id',
        'updater_id',
        'deleter_id',
        'creator_ip',
        'updater_ip',
        'deleter_ip',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public static function updateCache($event, $name = 'list')
    {
        if (in_array($event, self::$cacheEvents)) {

           $contact_us = ContactUs::orderBy('position', 'asc')->get();

            if($contact_us){

                Cache::forever("contactUs-$name", $contact_us);
            }
            return $contact_us;
        }
    }

    public static function cache($name)
    {
        if($cache = Cache::get("contactUs-$name"))  {

            if($cache->count()){
                return $cache;
            }
        }
        return self::updateCache('update', $name);
    }
}
