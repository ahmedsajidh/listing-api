<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Admin;

use Hash;

use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client;
use Validator;

use Auth;


class LoginController extends Controller

{



    public function userLogin(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',

            'password' => 'required',

        ]);


        if($validator->fails()){

            return response()->json(['error' => $validator->errors()->all()]);

        }


        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])){


            config(['auth.guards.api.provider' => 'user']);



            $user = User::select('users.*')->find(auth()->guard('user')->user()->id);


            $success =  $user;

            $success['api_token'] =  $user->createToken('User',['user'])->accessToken;
            dd($success);

            return response()->json($success, 200);

        }else{

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);

        }

    }




}