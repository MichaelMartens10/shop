<!DOCTYPE html>
<html lang="en">

  @include('layouts.head')

  <body>

    @include('layouts.navbar')

    <div class="container">

      @yield('content')

      @include('layouts.footer')

    </div>
  </body>

  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</html>
