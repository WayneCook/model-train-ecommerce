<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;

class ImageController extends Controller
{


    public function deleteOldProductImage(Request $request)
    {

        if ($product = Product::find($request->id)) {

            $image = $product->main_image;

            Storage::disk('product_images')->delete($image);
            Storage::disk('thumbnails')->delete($image);

            $product->main_image = null;
            $product->original_image_name = null;
            $product->save();

            return json_encode($request->id);
        }

    }

    public function deleteOldCategoryImage(Request $request)
    {

        if ($category = Category::find($request->id)) {

            $image = $category->image;

            Storage::disk('category_images')->delete($image);
            Storage::disk('thumbnails')->delete($image);

            $category->image = null;
            $category->original_image_name = null;
            $category->save();

            return json_encode($request->id);
        }
    }

    public function deleteOldSubCategoryImage(Request $request)
    {

        if ($subCategory = SubCategory::find($request->id)) {

            $image = $subCategory->image;

            Storage::disk('sub_category_images')->delete($image);
            Storage::disk('thumbnails')->delete($image);

            $subCategory->image = null;
            $subCategory->original_image_name = null;
            $subCategory->save();

            return json_encode($request->id);
        }
    }
}
