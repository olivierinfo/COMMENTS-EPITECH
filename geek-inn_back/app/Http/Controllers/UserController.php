<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getAllUsers()
     {
         $users = User::all();
         return response()->json(['users'=>$users]);
    }

    public function deleteUser($email)
    {
        $user = User::find($email);
        $user->delete();
        return 
            ('success, User deleted successfully');
    }
    public function readUser($id)
    {
      $user = User::findOrFail($id);
      return response()->json(['user'=>$user]);
    }
    public function updateUser (Request $request, $id)
    {
        $request->validate([
        
            'username' => 'string|min:6|max:25',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:6|max:25', 
            'picture' => 'string|max:255',
            'phone' => 'string|max:13',
            'is_admin',
        ]);
        $user = User::find($id);
        $user->update($request->all());
         $user->save();
        return "success: User update successfully";
    }
}