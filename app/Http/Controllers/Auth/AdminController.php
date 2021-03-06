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

class AdminController extends Controller
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

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }

    public function showRegistrationForm()
    {
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

    public function adminList(){
      if(Auth::guard('admin')->user()->role != 'admin'){
        return redirect('/');
      }

      $users = Admin::where('id', '!=', Auth::guard('admin')->user()->id)->where('role','!=','admin')->select('id', 'name', 'email', 'role')->get();
      return view('admin.admin-list')->with('users', $users);
    }

    public function updateUserForm($id){
      if(Auth::guard('admin')->user()->role != 'admin' && Auth::guard('admin')->user()->id != $id){
        return redirect('/');
      }

      $user = Admin::where('id', $id)->select('name', 'email', 'role')->first();
      return view('auth.update-admin')->with('user', $user);
    }


    public function destroyAdmin($id)
    {
        if(Auth::guard('admin')->user()->role != 'admin'){
          return redirect('/');
        }

        $user = Admin::find($id);

        $user->delete();

        return view('admin.admin-list');
    }

}
