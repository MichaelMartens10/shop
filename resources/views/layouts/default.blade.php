<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  @include('layouts.head')

  <body>

    @include('layouts.navbar')

    <div class="container">

      @yield('content')

      @include('layouts.footer')

    </div>
  </body>
  <script src="{{ asset('js/app.js') }}" defer></script>
</html>
