<?php

namespace App\Traits;

use App\Scopes\ActivityBatchDeleteScope;
use App\Scopes\ActivityUserDeleteScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait IpRecord
{
    public static $checkEvent  = true;

    public static $ipEvents = ['create' => true, 'update' => true, 'delete' =>true];

    public static function bootIpRecord()
    {

        self::creating(function($record) {
            if (self::$ipEvents['create']) {
                if (self::$checkEvent) {
                    $record->creator_ip = Request::ip();
                }
                else {
                    $record->creator_ip = null;
                }
            }

            if (self::$ipEvents['update']) {
                $record->updater_ip = null;
            }

            if (self::$ipEvents['delete']) {
                $record->deleter_ip = null;
            }
        });


        self::updating(function($record) {
            if (self::$checkEvent && self::$ipEvents['update']) {
                $record->updater_ip = Request::ip();
            }

            if (self::$checkEvent && self::$ipEvents['delete']) {
                $record->deleter_ip = null;
            }
        });

        self::deleting(function($record) {
            if (self::$checkEvent && self::$ipEvents['delete']) {
                self::$checkEvent = false;
                $record->deleter_ip = Request::ip();
                $record->save();
            }
        });
    }

}
