@extends('layouts.default')

@section('content')

  <h1>Cart</h1>

    <section class="row product-container">


      <!-- Make a foreach for products relative to db-->

      @if(Session::has('cart'))


            <ul class="list-group list-full">

              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-4">
                    <strong>Quantity</strong>
                  </div>
                  <div class="col-md-4">
                    <strong>Product</strong>

                  </div>

                  <div class="col-md-4">
                    <strong>Price</strong>

                  </div>

                </div>


              </li>

              @foreach($products as $product)
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      {{$product['qty']}}
                    </div>
                    <div class="col-md-4">
                      {{$product['item']['title']}}

                    </div>

                    <div class="col-md-4">
                      ${{$product['price']}}

                    </div>

                  </div>


                </li>
              @endforeach

              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-8">
                    <strong>Total Price:</strong>
                  </div>

                  <div class="col-md-4">
                    ${{$totalPrice}}

                  </div>

                </div>


              </li>

            </ul>





      @else
        <div class="row">
          <div class="col-md-12">
            <p>Cart is empty</p>
          </div>
        </div>
      @endif


    </section>


@stop
