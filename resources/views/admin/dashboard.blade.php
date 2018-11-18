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

          <a href="{{ URL::route('admin.register') }}" class="btn btn-primary">Add Admin</a>
          <a href="{{ URL::route('admin.list') }}" class="btn btn-primary">Admin List</a>
          <a href="{{ URL::route('admin.update', ['id' => $user->id]) }}" class="btn btn-primary">Change details</a>

    </div>
  </section>

</div>

@endsection
