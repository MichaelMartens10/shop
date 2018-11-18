<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nav;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Storage;



class NavController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth:admin');

    }


    public function show()
    {
      return view('navs.create');
    }


    public function create()
    {
        return view('navs.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [

          'name' => 'required',
          'path' => 'required',
          'parent_id' => '',

        ]);

        $nav = new Nav;
        $nav->name = $request->input('name');
        $nav->parent_id = $request->input('parent_id');
        $nav->path = $request->input('path');
        $nav->save();

        return redirect()->back();
    }



    public function edit($id)
    {
        $nav = Nav::find($id);
        return view('navs.edit')->with('nav', $nav);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [

        'name' => 'required',
        'path' => 'required',
        'parent_id' => '',

      ]);

      $nav = new Nav;
      $nav->name = $request->input('name');
      $nav->parent_id = $request->input('parent_id');
      $nav->path = $request->input('path');
      $nav->save();

      return redirect()->back();
    }


    public function destroy($id)
    {

        $nav = Nav::find($id);

        $nav->delete();

        return view('/');
    }
}
