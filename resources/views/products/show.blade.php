@extends('layouts.default')

@section('content')

    <section class="row product-container">


      <div class="col-md-12">
        <h1>{{$product->title}}</h1>
        <img src="/storage/product_images/{{$product->image}}" class="img-fluid" alt="">
        <p>{!!$product->description!!}</p>

      </div>

    </section>

@endsection
