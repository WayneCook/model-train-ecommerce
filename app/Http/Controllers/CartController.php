<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{

    public function addToCart(Request $request, int $id, int $count)
    {


        $product = Product::find($id);

        $oldCart = Session::get('cart');

        $cart = new Cart($oldCart);

        $cart->add($product, $count);

        //save new cart session
        $request->session()->put('cart', $cart);
        $request->session()->save();
        //json response
        return response()
            ->json([
                'cart' => $request->session()->get('cart')
            ]);

    }

    public function removeFromCart(Request $request, $id, $count)
    {

        $product = Product::find($id);

        $oldCart = Session::get('cart');

        $cart = new Cart($oldCart);

        $cart->remove($product, $count);

        //save new cart session
        $request->session()->put('cart', $cart);
        $request->session()->save();
        //json response
        return response()
            ->json([
                'cart' => $request->session()->get('cart')
            ]);
    }

    public function cartReset(Request $request)
    {

        $request->session()->forget(['cart']);
        $request->session()->save();

        return response()
            ->json([
                'cart' => $request->session()->get('cart')
            ]);
    }

    public function getCart(Request $request) {

        if ($request->session()->has('cart')) {
          return response()
              ->json([
                  'cart' => $request->session()->get('cart')
              ]);
        }

        return null;

    }
}
