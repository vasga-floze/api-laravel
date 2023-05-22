<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\User;
use Illuminate\Support\Facades\Auth; //para manejar inicios de sesion

class LoginController extends Controller
{
    //
    public function login(request $request){
        $this -> validateLogin($request);
        //validation
        if(Auth::attempt($request-> only('email', 'password'))){
            return response()->json([
                'token'=>$request->user()->createToken($request->name)->plainTextToken,
                'message'=>'success',
            ]);
        }
        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
        
    }

    public function validateLogin(Request $request){
        return $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
    }
}
