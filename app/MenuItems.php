<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class MenuItems extends Model
{
    public $timestamps = false;

    protected $table = 'menu_values';

    protected $fillable = array('title','url','route','parameters','order','parent_id','menu_id');

    public function parent()
    {
        return $this->belongsTo('App\MenuItems', 'parent_id');
    }

    public function childs() {
        return $this->hasMany('App\MenuItems','parent_id','id') ;
    }
}
