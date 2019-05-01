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


        public function deleteOldProductImage(Request $request){

        if ($product = $this->product::find($request->id)) {

            $image = $product->main_image;

            Storage::disk('product_images')->delete($image);
            Storage::disk('thumbnails')->delete($image);

            $oldImage = $this->product->find($request->id);
            $oldImage->main_image = null;
            $oldImage->save();

            return json_encode($request->id);
        }
    }

}
