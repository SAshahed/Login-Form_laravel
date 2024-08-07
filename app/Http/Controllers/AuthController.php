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
      $user = request()->validate([
        'name'   => 'required',
        'email'  => 'required|unique:users',
        'password'=> 'required|min:6',
        'confirm_password'  => 'required_with:password|same:password|min:6',

      ]);

      
      $user = new User;
      $user->name            = trim($request->name);
      $user->email           = trim($request->email);
      $user->password        = Hash::make($request->password);
      $user->remember_token	  = Str::random(50);
      $user->save();

      return redirect('/')->with('success', "Registor Successfully ");
    }

    public function CheckEmail(Request $request)
   {
     $email = $request->input('email');
     $isExists = User::where('email', $email)->first();
     if($isExists) {
         return response()->json(array("exists" => true));
     } else {
         return response()->json(array("exists" => false));
     }
   }

 }



 

    


?>