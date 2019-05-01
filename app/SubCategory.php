<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{




    //
    public function products()
    {

        return $this->belongsTo('App\Products', 'sub_categories_id');
    }

    public function category()
    {

        return $this->belongsTo('App\Category', 'categories_id');
    }
}
