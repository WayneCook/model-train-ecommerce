<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;

class ImageController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function delete(Request $request){

        if ($product = $this->product::find($request->id)) {

            $image = $product->main_image;
            $image_url = $product->id . '/' . $product->main_image;
            Storage::disk('product_images')->delete($image_url);

            $oldImage = $this->product->find($request->id);
            $oldImage->main_image = '';
            $oldImage->main_image_thumbnail = '';
            $oldImage->save();

            return json_encode($request->id);
        }
    }

}
