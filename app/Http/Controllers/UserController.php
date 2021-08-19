<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
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
            'email' =>'required|string|max:255|unique:contacts,email',
            'password' =>'required|min:8|',
            'phone'  => 'required|integer',
            'job_title'=> 'required|string|max:255|min:3',
        ]);
        User::create($request->except(['_token']));
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
            ]);
        }
        $row->update($request->except(['_token','_method']));
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
