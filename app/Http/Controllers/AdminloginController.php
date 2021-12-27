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

class AdminloginController extends Controller
{

    public function adminLogin(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',

            'password' => 'required',

        ]);


        if($validator->fails()){

            return response()->json(['error' => $validator->errors()->all()]);

        }


        if(auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){


            config(['auth.guards.api.provider' => 'admin']);


            $admin = Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);

            $success =  $admin;


            $success['api_token'] =  $admin->createToken('Admin',['admin'])->accessToken;
            dd($success);


            return response()->json($success, 200);

        }else{

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);

        }

    }

}
