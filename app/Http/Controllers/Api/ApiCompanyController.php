<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiCompanyController extends Controller
{
    public function index()
    {
        $data = Company::get();
        return CompanyResource::collection($data);
    }
    public function show($id)
    {
        $company = Company::findorfail($id);

        return new CompanyResource($company);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3|unique:companies,name',
            'email' => 'required|string|max:255|unique:contacts,email',
            'password' => 'required|min:8|',
            'phone'  => 'required|integer',
            'location' => 'required|string|max:255|min:3',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'location' => $request->location
        ]);
        return response()->json('Company Has Been Created Successfully');
    }
    public function update(Request $request, $id)
    {
        if ($row = Company::find($id)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:255|min:3|unique:companies,name,' . $id,
                'email' => 'required|string|max:255|unique:users,email',
                'password' => 'required|min:8',
                'phone'  => 'required|integer',
                'location' => 'required|string|max:255|min:3',
            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
        
        }
            $row->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'location' => $request->location
            ]);
        return response()->json('Company Has Been Updated Successfully');
    }

    public function destroy($id)
    {
        if ($row = Company::find($id)) {
            $row->delete();
            return response()->json('Company Has Been Deleted Successfully');
        }
        return response()->json('404');
    }
}
