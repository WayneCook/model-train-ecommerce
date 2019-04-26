<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        $products = Product::all();
        return view('product/index', ['products' => $products, 'pages' => $pages]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
      $product = Product::find($id);
      return view('product/show', ['product' => $product]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // dd($request);


    }

    public function destroy($id)
    {
        //
    }


}
