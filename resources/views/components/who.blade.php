@if(Auth::guard('web')->check())

  <p>You are logged in as USER</p>


@else
  <p>You are logged OUT as USER</p>
@endif

@if(Auth::guard('admin')->check())

  <p>You are logged in as ADMIN</p>


@else
  <p>You are logged OUT as ADMIN</p>
@endif
