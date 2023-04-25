<?php

namespace App\Traits;

use App\Scopes\ActivityBatchDeleteScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait AdminActivity
{
    public static $checkEvent  = true;

    public static $adminEvents = ['create' => true, 'update' => true, 'delete' => true];

    public static function bootAdminActivity()
    {
        if (self::$adminEvents['delete'])
            static::addGlobalScope(new ActivityBatchDeleteScope);

        self::creating(function($record) {
            if (self::$adminEvents['create']) {
                if (self::$checkEvent) {
                    if (!$record->creator_id)
                        $record->creator_id = Auth::guard('admin')->user()->id;
                    $record->creator_ip = Request::ip();
                }
                else {
                    $record->creator_id = null;
                    $record->creator_ip = null;
                }
            }

            if (self::$adminEvents['update']) {
                $record->updater_id = null;
                $record->updater_ip = null;
            }

            if (self::$adminEvents['delete']) {
                $record->deleter_id = null;
                $record->deleter_ip = null;
            }
        });


        self::updating(function($record) {
            if (self::$checkEvent && self::$adminEvents['update']) {
                $record->updater_id = Auth::guard('admin')->user()->id;
                $record->updater_ip = Request::ip();
            }

            if (self::$checkEvent && self::$adminEvents['delete']) {
                $record->deleter_id = null;
                $record->deleter_ip = null;
            }
        });

        self::deleting(function($record) {
            if (self::$checkEvent && self::$adminEvents['delete']) {
                self::$checkEvent = false;
                $record->deleter_id = Auth::guard('admin')->user()->id;
                $record->deleter_ip = Request::ip();
                $record->save();
            }
        });
    }

    public function creator()
    {
        if (self::$adminEvents['create']) {
            return $this->belongsTo('App\Admin', 'creator_id');
        }

        return null;
    }

    public function updater()
    {
        if (self::$adminEvents['update']) {
            return $this->belongsTo('App\Admin', 'updater_id');
        }

        return null;
    }

    public function deleter()
    {
        if (self::$adminEvents['delete']) {
            return $this->belongsTo('App\Admin', 'deleter_id');
        }

        return null;
    }
}
