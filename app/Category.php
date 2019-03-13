<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'categories_id');
    }

}
