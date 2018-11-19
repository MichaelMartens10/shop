
<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="/">Home</a>


              <ul class="navbar-nav ml-auto">

              @foreach($nav as $item)
                  @if($item->parent_id == null)
                  <li class="nav-item dropdown">

                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{$item->name}} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                @foreach($nav as $sub_item)

                  @if($item->id == $sub_item->parent_id)
                    <a class="dropdown-item" href="{{$sub_item->path}}">
                      {{$sub_item->name}}
                    </a>
                  @endif

                @endforeach

              </div>
              </li>

                @endif
              @endforeach

              </ul>


            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">


                <li clasS="nav-item">
                  <a href="{{ route('cart')}}" class="nav-link">


                    Cart{{Session::has('cart')? '(' . Session::get('cart')->totalQty . ')' : ''}}
                  </a>
                </li>


                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else

                    <li class="nav-item dropdown">



                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                          <a class="dropdown-item" href="/login">Dashboard
                          </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
