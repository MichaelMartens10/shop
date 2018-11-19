@extends('layouts.default')

@section('content')

  <h1>Test</h1>

    <section class="row product-container">

      <ul class="list-group list-full">
      @foreach($users as $user)

        <li class="list-group-item">
          <div class="row">
            <div class="col-md-1">
              {{$user->id}}
            </div>
            <div class="col-md-3">
              {{$user->name}}
            </div>
            <div class="col-md-2">
              {{$user->role}}
            </div>
            <div class="col-md-3">
              {{$user->email}}
            </div>
            <div class="col-md-3">

              <a href="{{ URL::route('admin.update', ['id' => $user->id]) }}" class="btn btn-primary">Update</a>
              <a href="{{ URL::route('admin.destroy', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </li>
      @endforeach
      </ul>
    </section>

@stop
