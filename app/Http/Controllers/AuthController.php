<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    /**
     * ensure the registration of user in the gym app
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function register(Request $request){
        // make validation depends on request

        $fields = $request->validate([
            'name' => 'required' ,
            'email' => 'required | email' ,
            // the password confirmed constrain is looking for input with name password_confirmation that has to
            // matched to the password field
            'password' => 'required | confirmed',
        ]);
        // create the user object in the database
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
             'password' => Hash::make($fields['password']),
        ]);


        // genrate random token to access protected middlewares

        $token = $user->createToken('myapitoken')->plainTextToken;
        $response = [
            'user' => $user ,
            'token' => $token,

        ];
        return response($response , 201);


    }
      /**
     * ensure the login  of user in the gym app
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){

        // make validation
        $fields = $request->validate([

            'email' => 'required' ,
            'password' => 'required',
        ]);
        //  check email
        $user = User::where('email' , $fields['email'])->first();

        // check password
        if(!$user || !Hash::check($fields['password'] , $user->password)){
            return response([
                'error' => 'bad credentials',

            ] , 401);
        }
      // generate token
        $token = $user->createToken('myapitoken')->plainTextToken;
        $response = [
            'user' => $user ,
            'token' => $token,

        ];
        return response($response , 201);


    }
      /**
     * logout method that ensures the logout of the user
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function logout(Request $request){


        // log out the authenticated user
    $request->user()->tokens()->delete();

    return response([
        'success' => true,
        'message' => 'logged out',
    ] , 200);



    }
}
