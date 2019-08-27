<?php

namespace App\Http\Controllers;
use App\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {

      return view('category.show', compact('category'));

    }
}
