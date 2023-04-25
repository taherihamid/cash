<?php

namespace App\Traits;

use App\Scopes\ActiveScope;

trait Active
{
    public static $activeScope = true;

    public static function bootActive()
    {
        if (self::$activeScope) {
            static::addGlobalScope(new ActiveScope);
        }
    }
}
