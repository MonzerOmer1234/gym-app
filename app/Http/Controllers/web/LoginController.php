<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // login the user to gym app
    /**
     *@return view
     */
    public function login(){
        return view('auth.login');
    }

    // store the user in gym app database
    /**
     *@param Illuminate\Http\Request $request
     *@return Response
     */
    public function store(Request $request){
     $request->validate([
        'email' => 'required',
        'password' => 'required',
     ]);
     if(Auth::guard('web')->attempt(['email' => $request->email , 'password' => $request->password])){
        return redirect()->intended(route('welcome'));

     } else{
        return back()->with([
            'creds' => "invalid login data"
        ]);
     }
    }

    // logout the user out of  gym app
    /**
     *@param Illuminate\Http\Request $request
     *@return Response
     */
    public function logout(Request $request){
     Auth::guard('web')->logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return to_route('welcome');


    }
}
