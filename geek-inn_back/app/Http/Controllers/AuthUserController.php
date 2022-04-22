<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|min:6|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:25', 
            'picture' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);       
        } else{
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'picture'=> $request->picture,
                'password' => Hash::make($request->password)
             ]);
             $token = $user->createToken('user_auth_token')->plainTextToken;
        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
        }
    }
    public function loginUser(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
            ->json(['username' => $user->username,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function logoutUser(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        // $request->session()->flush();
        return response()->json();
    }
}