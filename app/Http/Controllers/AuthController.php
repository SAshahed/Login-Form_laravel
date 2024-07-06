<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;

 class AuthController extends Controller{
    public function index(Request $request)
    {
         return view('login');
    }

    public function forgot_password(Request $request)
    {
        return view('forgot_password');
    }
    public function register(Request $request)
    {
        return view('register');
    }

    public function RegisterPost(Request $request)
    {
      //dd($request->all());

      $user = new User;
      $user->name            = trim($request->name);
      $user->email           = trim($request->email);
      $user->password        = Hash::make($request->password);
      $user->remember_token	  = Str::random(50);
      $user->save();

      return redirect('/')->with('success', "Registor Successfully ");
    }

 }



 

    


?>