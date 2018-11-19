<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Admin;

class DashboardController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth')->only(['user']);

      $this->middleware('guest:admin')->only(['adminLogin']);

      $this->middleware('auth:admin')->only(['admin']);

  }

    public function user()
    {

      $user_id = auth()->user()->id;
      $user_details = User::where('id', $user_id)->select('name', 'email', 'city', 'areacode', 'address', 'phone')->first();
      return view('user.dashboard')->with('user', $user_details);

    }

    public function adminLogin(){

      if(Auth::user()){
        return redirect('/');
      }

      return view('auth.admin-login');
    }

    public function login(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    if(Auth::guard('admin')->attempt([
      'email' => $request->email,
      'password'=>$request->password]

      , $request->remember)){

      return redirect()->intended(route('admin.dashboard'));
    }

    return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function admin(){
      $user = Auth::guard('admin')->user();

      return view('admin.dashboard')->with('user', $user);

    }

}
