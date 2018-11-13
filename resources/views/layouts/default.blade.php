<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  @include('layouts.head')

  <body>

    @include('layouts.navbar')

    <div class="container">

      @yield('content')

      @include('layouts.footer')

    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>
  </body>

</html>
