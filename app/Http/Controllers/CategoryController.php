<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;

class CategoryController extends Controller
{
    public function index($slug)
    {

      $subCategories = Category::where('slug', $slug)->with('subCategories')->get();
      return view('product.categories',['subCategories' => $subCategories]);

    }
}
