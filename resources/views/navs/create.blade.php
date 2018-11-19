@extends('layouts.default')

@section('content')

    <section class="row product-container">


      <div class="col-md-12">
        <h1>Create Nav</h1>
      </div>
      <div class="col-md-12">
        {!! Form::open(['action' => 'NavController@store', 'method' => 'POST']) !!}

          <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class'=> 'form-control', 'placeholder'=>'name'])}}
          </div>
          <div class="form-group">
            {{Form::label('parent_id', 'Parent id')}}
            {{Form::text('parent_id', '', ['id'=>'article-ckeditor', 'class'=> 'form-control '])}}
          </div>
          <div class="form-group">
            {{Form::label('path', 'Path')}}
            {{Form::text('path', '', ['class'=> 'form-control', 'placeholder'=>'path'])}}
          </div>

          {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>


    </section>

@endsection
