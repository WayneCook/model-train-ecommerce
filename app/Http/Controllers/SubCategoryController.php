<?php

namespace App\Http\Controllers;
use App\subCategory;
use App\Category;
use App\Product;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index($category, $subCategory)
    {

        $category_id = Category::select('id')->where('slug', $category)->first()->id;
        $subCategory_id = subCategory::select('id')->where('slug', $subCategory)->first()->id;

        return Product::where('categories_id', $category_id)->where('sub_categories_id', $subCategory_id)->get();
    }
}
