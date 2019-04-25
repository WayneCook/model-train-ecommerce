<?php

namespace App\Models;

use App\imageRepositories\ImageRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Backpack\CRUD\CrudTrait;
use App\Models\ProductImage;
use Illuminate\Http\Request;


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

    //Store image file to disc
    public function storeProductImage(Request $request, $id)
    {
        $product = Product::find($id);
        $image = $request->main_image;
        $oldImageUrl = $id.'/'.$product->main_image;

        if ($image->store($id, ['disk' => 'product_images'])) {

            $this->deleteOldProductImage($oldImageUrl);
            $this->saveProductImage($image, $product);
        }

    }

    //Save image data in database
    public function saveProductImage($storedImage, $product)
    {

        $product->main_image = $storedImage->hashName();
        $product->main_image_thumbnail = $storedImage->hashName();
        $product->original_image_name = $storedImage->getClientOriginalName();
        $product->save();

    }

    //Delete old image file from disk
    public function deleteOldProductImage($url)
    {

      Storage::disk('product_images')->delete($url);

    }

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
