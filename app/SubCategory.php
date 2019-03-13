<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function products($category, $subCategory)
    {
      
        return $this->hasMany('App\Products', 'sub_categories_id');
    }
}
