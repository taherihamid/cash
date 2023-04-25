<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Menu extends Model
{
    public $timestamps = false;

    protected $table = 'menu';

    protected $fillable = array('name','english_name');

    public function parent()
    {
        return $this->belongsTo('App\Menu', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id');
    }
}
