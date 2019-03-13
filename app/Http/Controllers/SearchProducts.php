<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class SearchProducts extends Controller
{

  public function search($category)
  {
    $product = Product::find($id);
    return view('product.show', ['product' => $product]);
  }

}
