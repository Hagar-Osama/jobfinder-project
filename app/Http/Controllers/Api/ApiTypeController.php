<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTypeController extends Controller
{
    public function index()
    {
        $data = Type::get();
        return TypeResource::collection($data);
    }
    public function show($id)
    {
        $type = Type::findorfail($id);

        return new TypeResource($type);
    }
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255|min:3|unique:types,name',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Type::create($request->except(['_token']));
        return response()->json('Type Has Been Added Successfully');
    }
    public function update(Request $request, $id)
    {
        if ($row = Type::find($id)) {
            $validate = Validator::make($request->all(),[
                'name'=>'required|string|max:255|min:3|unique:types,name',
            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
            $row->update($request->except(['_token']));
            return response()->json('Type Has Been Updated Successfully');
        } 
    }
    public function destroy($id)
    {
        if ($type = Type::Find($id)) {
            $type->delete();
            return response()->json('Type Has Been Deleted Successfully');

        }
        return response()->json('404');
    }
}
