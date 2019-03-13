<?php

namespace App\Http\Controllers;
use App\SubCategory;
use App\Category;

use Illuminate\Http\Request;

class NavigationController extends Controller
{



    public function index()
    {

      return Category::with('subCategories')->get();

    }

}
