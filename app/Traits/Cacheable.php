<?php

namespace App\Traits;

use Exception;

trait Cacheable
{
    public static $cacheEvents = ['create', 'update', 'delete'];

    public static function bootCacheable()
    {
        if (method_exists(self::class, 'updateCache')) {
            self::created(function() {
                self::updateCache('create');
            });

            self::updated(function() {
                self::updateCache('update');
            });

            self::deleted(function() {
                self::updateCache('delete');
            });
        }
        else {
            throw new Exception("This function is undefined: updateCache");
        }
    }
}
