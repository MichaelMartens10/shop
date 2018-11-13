@extends('layouts.default')

@section('content')

    <section class="row product-container">


      <div class="col-md-12">
        <h1>Create Post</h1>
      </div>
      <div class="col-md-12">
        {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

          <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=> 'form-control', 'placeholder'=>'title'])}}
          </div>
          <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textArea('description', '', ['id'=>'article-ckeditor', 'class'=> 'form-control ', 'placeholder'=>'description'])}}
          </div>
          <div class="form-group">
            {{Form::label('image', 'Image')}}
            {{Form::file('image')}}
          </div>
          <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::text('type', '', ['class'=> 'form-control', 'placeholder'=>'type'])}}
          </div>
          <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::number('price', '', ['class'=> 'form-control', 'placeholder'=>'price'])}}
          </div>
          <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', '', ['class'=> 'form-control', 'placeholder'=>'stock'])}}
          </div>

          {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>

//title
//image
//imageType
//description
//price
//type
//stock


    </section>

@endsection
