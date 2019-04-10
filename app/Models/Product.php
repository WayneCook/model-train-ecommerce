<?php

namespace App\Models;

use App\imageRepositories\ImageRepository;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\ProductImage;


class Product extends Model
{

    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    public $with = ['images'];
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ["name","categories_id","sub_categories_id","brand","scale","description","images","price","stock","slug","created_at","updated_at"];

    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function images()
    {

       return $this->hasMany('App\Models\ProductImage', 'product_id');

    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    // public function setImagesAttribute($value)
    // {
    //     $attribute_name = "images";
    //     $disk = "product_images";
    //     $destination_path = "product/".$this->name;
    //     $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    // }



}
