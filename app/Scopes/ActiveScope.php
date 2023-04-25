<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\User;

class ActiveScope implements Scope
{
    const NOT_ACTIVE = 0;
    const ACTIVE     = 1;

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('active', self::ACTIVE);
    }
}
