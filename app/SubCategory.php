<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    public function products()
    {
        return $this->hasMany('App\Product', 'sub_category_id');
    }

    public function category()
    {

        return $this->belongsTo('App\Category', 'categories_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
