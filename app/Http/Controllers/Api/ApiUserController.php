<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
           'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|min:8|',
            'phone'  => 'required|integer',
            'job_title' => 'required|string|max:255|min:3',
            'type' => 'required|in:person,company',
            'is_Admin' => 'boolean'

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' =>$request->phone,
        'job_title' => $request->job_title,
        'type' => $request->type,
        'is_Admin' => $request->is_Admin
        ]);
        $token = $user->createToken('auth');
        return response()->json(['token' => $token->plainTextToken]);
    }

}
