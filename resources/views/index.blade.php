@extends('layouts.default')

@section('content')

<div class="container">

  <h1>Test</h1>

    <section class="row product-container">


      <!-- Make a foreach for products relative to db-->
      @for ($i = 0; $i < 5; $i++)

      <div class="col-md-4 product-item">
        <div class="product-image">
          <img src="https://i.pinimg.com/originals/63/72/05/6372058fc6082594c9b33756546f2be8.jpg" class="img-fluid" alt="">
        </div>
        <div class="product-title">
          Title Name
        </div>

        <div class="product-purchase-details">

          <div class="product-price">
            $19.00
          </div>
          <div class="product-cart">
            <button type="button" class="btn btn-primary">Add to Cart</button>
          </div>

        </div>
      </div>

      @endfor

    </section>
  </div>
@stop
