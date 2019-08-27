<?php

namespace App\Models;

use App\imageRepositories\ImageRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Backpack\CRUD\CrudTrait;
use App\Traits\Sanitizer;
use Image;


class Product extends Model
{

    use CrudTrait;
    use Sanitizer;

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
    protected $fillable = ["name","category_id","sub_category_id","brand","scale","description","main_image","price","stock","created_at","updated_at"];
    protected $hidden = ["original_image_name","slug"];
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

    public function category()
    {
       return $this->belongsTo('App\Models\Category','category_id');
    }

    public function subCategory()
    {
       return $this->belongsTo('App\Models\SubCategory','sub_category_id');
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

    public function setMainImageAttribute($value)
    {
        $attribute_name = "main_image";
        $image_disk     = "product_images";
        $thumbnail_disk = 'thumbnails';
        // Set original file name attribute
        $originalFileName = $this->clean($value->getClientOriginalName());

        $this->original_image_name = $originalFileName;

        // Save image file to disk and set image attribute
        $this->customUploadFileToDisk($value, $attribute_name, $image_disk, $thumbnail_disk);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }
}
