<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Cart;
use Session;


class CartController extends Controller
{

    public function addToCart(Request $request){
      $product = Product::find($request->id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id, $request->qty);

      $request->session()->put('cart', $cart);

      return redirect()->back();

    }

    public function cart(){

        if(!Session::has('cart')){
          return view('cart', ['products'=>null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('cart', ['products'=> $cart->items, 'totalPrice'=>$cart->totalPrice]);

        }
}
