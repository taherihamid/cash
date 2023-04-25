<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Request;
use Auth;

class ActivityBatchDeleteScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        
    }

    public function extend(Builder $builder)
    {
        $builder->onDelete(function (Builder $builder) {
            return $builder->update([
                'deleter_id' => Auth()->guard('admin')->user()->id,
                'deleter_ip' => Request::ip(),
                'deleted_at' => $builder->getModel()->freshTimestampString()
            ]);
        });
    }
}