<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth:admin')->except(['show']);

    }


    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [

          'title' => 'required',
          'description' => 'required',
          'price' => 'required',
          'type' => 'required',
          'stock' => 'required',
          'image'=> 'image|nullable|max:1999',

        ]);

        if($request->hasFile('image')){

          $fileNameWithExt = $request->file('image')->getClientOriginalName();

          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

          $extension = $request->file('image')->getClientOriginalExtension();

          $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

          $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);
        }
        else{

          $fileNameToStore ='noimage.jpg';
        }

        $product = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = $fileNameToStore;
        $product->price = $request->input('price');
        $product->type = $request->input('type');
        $product->stock = $request->input('stock');
        $product->save();

         return redirect('/');
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [

        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'type' => 'required',
        'stock' => 'required'

      ]);

      if($request->hasFile('image')){

        $fileNameWithExt = $request->file('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('image')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        $path = $request->file('image')->storeAs('public/product_images', $fileNameToStore);
      }

      $product = Product::find($id);
      $product->title = $request->input('title');
      $product->description = $request->input('description');
        if($request->hasFile('image')){
          $product->image = $fileNameToStore;
        }
      $product->price = $request->input('price');
      $product->type = $request->input('type');
      $product->stock = $request->input('stock');
      $product->save();

      return redirect('/');
    }


    public function destroy($id)
    {

        $product = Product::find($id);

        if($product->image != 'noimage.jpg'){
          Storage::delete('public/product_images/' . $product->image);
        }

        $product->delete();

        return redirect('/');
    }
}
