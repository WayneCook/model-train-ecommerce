<?php

namespace App;
use App\Traits\filterable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use filterable;

    protected $guarded = ['id'];

    public function subCategories()
    {
        return $this->belongsTo('App\Category');
    }


}
