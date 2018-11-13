@extends('layouts.default')

@section('content')


<div class="container">
  <section>

    <div class="row justify-content-center">
        <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">


                            {{ session('status') }}


                        </div>
                    @endif

                    {{$user->name}}
                    {{$user->email}}
                    {{$user->city}}
                    {{$user->areacode}}
                    {{$user->phone}}
                    {{$user->address}}

                    @component('components.who')

                    @endcomponent
    </div>
  </section>

</div>

@endsection
