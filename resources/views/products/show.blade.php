@extends('layouts.default')

@section('content')

    <section class="row product-container">


      <div class="col-md-12">
        <h1>{{$product->title}}</h1>
        <p>{{$product->description}}</p>

      </div>

    </section>

@stop
