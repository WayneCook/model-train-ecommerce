<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'category_id');
    }

    public function products()
    {

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
