@extends('layouts.default')

@section('content')


<div class="container">
  <section>


    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>admin panel</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">


                            {{ session('status') }}


                        </div>
                    @endif


    </div>
  </section>

</div>

@endsection
