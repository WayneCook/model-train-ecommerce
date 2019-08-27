<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Traits\Sanitizer;


class SubCategory extends Model
{
    use CrudTrait;
    use Sanitizer;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'sub_categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name',	'category_id', 'description',	'image'];
    protected $hidden = ['slug', 'thumbnail', 'original_image_name'];
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
    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
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
        $image_disk     = "sub_category_images";
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
