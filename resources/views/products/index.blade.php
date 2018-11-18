@extends('layouts.default')

@section('content')
    <section class="row product-container">

      <div class="col-md-12">
        <h1 class='text-center'>A list over all our products</h1>
      </div>
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
              {!! Form::open(['action' => 'CartController@addToCart', 'method' => 'POST']) !!}
              {{Form::hidden('id',$product->id)}}
              {{Form::number('qty', '1', ['class'=> 'form-control'])}}
              {{Form::submit('Add to Cart', ['class'=> 'btn btn-primary'])}}
              {!! Form::close() !!}
            </div>

          </div>

        </div>


      @endforeach

    </section>

@stop
