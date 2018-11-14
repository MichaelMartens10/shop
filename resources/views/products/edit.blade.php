@extends('layouts.default')

@section('content')

    <section class="row product-container">

      <div class="col-md-12">
        <h1>Create Post</h1>
      </div>
      <div class="col-md-12">
        {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

          <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $product->title, ['class'=> 'form-control', 'placeholder'=>'title'])}}
          </div>
          <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textArea('description', $product->description, ['id'=>'article-ckeditor', 'class'=> 'form-control ', 'placeholder'=>'description'])}}
          </div>
          <div class="form-group">
            {{Form::label('image', 'Image')}}
            {{Form::file('image')}}
          </div>
          <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::text('type', $product->type, ['class'=> 'form-control', 'placeholder'=>'type'])}}
          </div>
          <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::number('price', $product->price, ['class'=> 'form-control', 'placeholder'=>'price'])}}
          </div>
          <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', $product->stock, ['class'=> 'form-control', 'placeholder'=>'stock'])}}
          </div>
          {{Form::hidden('_method','PUT')}}
          {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>

<p>
  //title
  //image
  //imageType
  //description
  //price
  //type
  //stock
</p>

{!!Form::open(['action' => ['ProductController@destroy', $product->id], 'method'=>'POST'])!!}

    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}

    </section>

@endsection
