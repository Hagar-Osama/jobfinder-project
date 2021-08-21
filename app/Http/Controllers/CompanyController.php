<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::select('id','name', 'email', 'password', 'location', 'phone')->get();
        return view('companies.index', ['companies' => $data]);
     }

     public function create()
     {
         return view('companies.create');
     }

     public function store(Request $request)
     {
          //validations
          $request->validate([
             'name' => 'required|string|max:255|min:3|unique:companies,name',
             'email' =>'required|string|max:255|unique:contacts,email',
             'password' =>'required|min:8|',
             'phone'  => 'required|integer',
             'location'=> 'required|string|max:255|min:3',
         ]);
         Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' =>$request->phone,
            'location' => $request->location
         ]);
         return redirect()->route('companies.index')->with('success', 'Company Has Been Created Successfully');
     }

     public function show($id)
     {
         $row =    Company::FindOrFail($id);
         return view ('companies.show', ['company' => $row]);
     }

     public function edit($id)
     {
         $row = Company::find($id);
         return view('companies.edit', ['company'=>$row]);
     }

     public function update(Request $request, $id)
     {
         if ($row = Company::find($id)) {
             $request->validate([
                 'name' => 'required|string|max:255|min:3|unique:companies,name,'.$id,
                 'email' =>'required|string|max:255|unique:users,email',
                 'password' =>'required|min:8',
                 'phone'  => 'required|integer',
                 'location'=> 'required|string|max:255|min:3',
             ]);
         }
         $row->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' =>$request->phone,
            'location' => $request->location
          ]);
         return redirect()->route('companies.index')->with('success', 'Company Has Been Updated Successfully');

     }

     public function destroy($id)
     {
         if($row = Company::find($id)) {
             $row->delete();
             return redirect()->route('companies.index')->with('success', 'Company Has Been Deleted Successfully');
         }
         return abort('404');
     }
 }
