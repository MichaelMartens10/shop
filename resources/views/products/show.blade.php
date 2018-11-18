@extends('layouts.default')

@section('content')

  <section class="row product-container">
    <h1>{{$product->title}}</h1>

      <div class="row">


      <div class="col-md-4">
        <img src="/storage/product_images/{{$product->image}}" class="img-fluid" alt="">



      </div>
        <div class="col-md-4">
          <p>{!!$product->description!!}</p>

        </div>

        <div class="col-md-4">
          {!! Form::open(['action' => 'CartController@addToCart', 'method' => 'POST']) !!}
          {{Form::hidden('id',$product->id)}}
          {{Form::number('qty', '1', ['class'=> 'form-control'])}}
          {{Form::submit('Add to Cart', ['class'=> 'btn btn-primary'])}}
          {!! Form::close() !!}
        </div>
    </div>

  </section>

@endsection
