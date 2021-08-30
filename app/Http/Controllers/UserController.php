<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'job_title')->get();
       return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
         //validations
         $request->validate([
            'name' => 'required|string|max:255|min:3|unique:users,name',
            'email' =>'required|string|max:255|unique:users,email',
            'password' =>'required|min:8|',
            'phone'  => 'required|integer',
            'job_title'=> 'required|string|max:255|min:3',
            'type'=> 'required|in:person,company',
            'is_Admin' => 'boolean'

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' =>$request->phone,
            'job_title' => $request->job_title,
            'type' => $request->type,
            'is_Admin' => $request->is_Admin
         ]);
        return redirect()->route('users.index')->with('success', 'User Has Been Created Successfully');
    }

    public function show($id)
    {
        $user = User::FindOrFail($id);
        return view ('users.show', ['$user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        if ($row = User::find($id)) {
            $request->validate([
                'name' => 'required|string|max:255|min:3|unique:users,name,'.$id,
                'email' =>'required|string|max:255|unique:users,email',
                'password' =>'required|min:8',
                'phone'  => 'required|integer',
                'job_title'=> 'required|string|max:255|min:3',
                'type'=> 'required|in:person,company',
                'is_Admin' => 'boolean'

            ]);
        }
        $row->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' =>$request->phone,
            'job_title' => $request->job_title,
            'type' => $request->type,
            'is_Admin'=>$request->is_Admin

         ]);
        return redirect()->route('users.index')->with('success', 'User Has Been Updated Successfully');

    }

    public function destroy($id)
    {
        if($row = User::find($id)) {
            $row->delete();
            return redirect()->route('users.index')->with('success', 'User Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
