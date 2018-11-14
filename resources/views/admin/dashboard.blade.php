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

          <a href="/admin/register" class="btn btn-primary">Add Admin</a>

          @component('components.who')

          @endcomponent

    </div>
  </section>

</div>

@endsection
