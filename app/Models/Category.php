<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\SubCategory;
use App\Traits\Sanitizer;

class Category extends Model
{
    use CrudTrait;
    use Sanitizer;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'category_id', 'image'];
    protected $hidden = ['slug'];
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

    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id');
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

    public function setImageAttribute($value)
    {

        $attribute_name = "image";
        $image_disk     = "category_images";
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
