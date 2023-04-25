<?php

namespace App\Traits;

use App\Scopes\ActivityBatchDeleteScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait userActivity
{
    public static $checkEvent  = true;

    public static $userEvents = ['create' => true, 'update' => true, 'delete' => true];

    public static function bootUserActivity()
    {
        if (self::$userEvents['delete'])
            static::addGlobalScope(new ActivityBatchDeleteScope);

        self::creating(function($record) {
            if (self::$userEvents['create']) {
                if (self::$checkEvent) {
                    if (!$record->creator_id)
                        $record->creator_id = app('request')->header('userid');
                    $record->creator_ip = Request::ip();
                }
                else {
                    $record->creator_id = null;
                    $record->creator_ip = null;
                }
            }

            if (self::$userEvents['update']) {
                $record->updater_id = null;
                $record->updater_ip = null;
            }

            if (self::$userEvents['delete']) {
                $record->deleter_id = null;
                $record->deleter_ip = null;
            }
        });


        self::updating(function($record) {
            if (self::$checkEvent && self::$userEvents['update']) {
                $record->updater_id = app('request')->header('userid');
                $record->updater_ip = Request::ip();
            }

            if (self::$checkEvent && self::$userEvents['delete']) {
                $record->deleter_id = null;
                $record->deleter_ip = null;
            }
        });

        self::deleting(function($record) {
            if (self::$checkEvent && self::$userEvents['delete']) {
                self::$checkEvent = false;
                $record->deleter_id = app('request')->header('userid');
                $record->deleter_ip = Request::ip();
                $record->save();
            }
        });
    }

    public function creator()
    {
        if (self::$userEvents['create']) {
            return $this->belongsTo('App\SsoUser', 'creator_id');
        }

        return null;
    }

    public function updater()
    {
        if (self::$userEvents['update']) {
            return $this->belongsTo('App\SsoUser', 'updater_id');
        }

        return null;
    }

    public function deleter()
    {
        if (self::$userEvents['delete']) {
            return $this->belongsTo('App\SsoUser', 'deleter_id');
        }

        return null;
    }
}
