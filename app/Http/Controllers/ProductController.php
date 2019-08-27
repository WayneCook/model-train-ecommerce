<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;

class ProductController extends Controller
{

    public function index(Category $category, SubCategory $subCategory): object
    {

        return view('product/index', ['category' => $category, 'subCategory' => $subCategory]);
        // return view('product/index', ['products' => $products->advancedFilter()]);
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
