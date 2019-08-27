<?php
namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use App\Support\FilterControl;


class ProductApiController extends Controller
{
    public function index()
    {

        $products = Product::where([
            ['category_id', '=', json_decode(request('category'))->id],
            ['sub_category_id', '=', json_decode(request('subcategory'))->id]
        ]);

        return response()->json([
            'allData' => $products->get(),
            'collection' => $products->advancedFilter()
            ]);

    }
}
