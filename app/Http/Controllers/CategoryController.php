<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SubCategory;
use App\Product;
use App\Category;

class CategoryController extends Controller
{
    public function index($slug)
    {

      $category = Category::where('slug', $slug)->with('subCategories')->first();

      return view('product.categories',['category' => $category]);

    }
}
