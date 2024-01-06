<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   /**
    * User Register (POST, formdata)  Open API
    */
    public function register(Request $request){
        
        //Validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "phone_number" => "required|unique:users",
            "password" => "required|confirmed",
        ]);

        //User Model
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "password" => Hash::make($request->password)
        ]);

        //response

        return response()->json([
            "status"=> true,
            "message"=> "User Created Successfully!"
        ]);

        
    }

    /**
     * User Login  (POST, formdata) Open API
     */
    public function login(Request $request){

    }

    /**
     * User Profile (GET)
     */
    public function profile(){

    }

    /**
     * To Generate Refresh Token Value
     */
    public function refreshToken(){

    }

    /**
     * User Logout (GET)
     */
    public function logout(){
        
    }


}
