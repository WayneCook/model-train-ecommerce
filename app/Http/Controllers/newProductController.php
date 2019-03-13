<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use App\Product;


class newProductController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{


public function store(Request $request)
{

  dd($request);

  if($request->hasfile('images'))
  {

    //validate image files
    $validatedData = $request->validate([
        'images' => 'image|mimes:jpeg,png,jpg',
        'name' => 'required|max:255',

     ]);

    $file = $request->file('images');
    $extension = $file->getClientOriginalExtension(); // getting image extension
    $fileName = $file->getClientOriginalName();

    // $file->move('uploads/logos/', $filename);
  }


}

public function edit(Request $request, $id)
{

  return view('vendor/voyager/products/edit-add',['id' => $id]);


}

}
