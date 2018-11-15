<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use App\Product;




class HomeController extends Controller
{

    public function index(){

      $products = Product::all();
      return view('index')->with('products', $products);
    }
}
