<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterAdminController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/admin';


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'string', 'min:1'],

        ]);
    }



    public function showRegistrationForm()
    {
        if(Auth::guard('admin')->user()->role != 'admin'){
          return redirect('/');
        }

        return view('auth.register-admin');
    }

    public function updateRegistrationForm(){
      if(Auth::guard('admin')->user()->role != 'admin'){
        return redirect('/');
      }

      return view('auth.register-admin');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect('/admin');
    }

}
