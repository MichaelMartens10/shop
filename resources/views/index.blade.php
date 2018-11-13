@extends('layouts.default')

@section('content')

  <h1>Test</h1>

    <section class="row product-container">


      <!-- Make a foreach for products relative to db-->
      @foreach($products as $product)

        <div class="col-md-4 product-item">
          <a href="products/{{$product->id}}">
            <div class="product-image">
              <img src="/storage/product_images/{{$product->image}}" class="img-fluid" alt="">
            </div>
          </a>
          <div class="product-title">
            {{$product->title}}
          </div>

          <div class="product-purchase-details">

            <div class="product-price">
              ${{$product->price}}
            </div>
            <div class="product-cart">
              <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>

          </div>

        </div>


      @endforeach

    </section>

    @component('components.who')

    @endcomponent

@stop
