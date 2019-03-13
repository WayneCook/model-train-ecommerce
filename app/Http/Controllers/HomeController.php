<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

      // $featuredProducts = Product::all();
      $featuredProducts = Product::take(4)->get();

        return view('home',['featuredProducts' => $featuredProducts]);
    }
}
