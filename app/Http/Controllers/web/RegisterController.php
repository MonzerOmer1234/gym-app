<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // register the user to gym app
    /**
     * @return view
     */
    public function register(){

        return view('auth.register');

    }
      // store the user to gym app
    /**
     * @param Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request){
       $request->validate([
        'name' => 'required ',
        'email' => 'required | email | unique:users',
        'password' => 'required | confirmed',
       ]);

       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);
       auth()->login($user);

       return to_route('welcome');
    }
}
