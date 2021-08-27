<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return CategoryResource::collection($data);
    }
    public function show($id)
    {
        $category = Category::findorfail($id);

        return new CategoryResource($category);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3|unique:categories,name',
            'icon' => 'required|string|max:255|min:3',
            'job_num' => 'required|integer',

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Category::create($request->except(['_token']));
        return response()->json('Data Has Been Stored Successfully');
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        if ($row = Category::find($id)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:255|min:3|unique:categories,name,' . $id,
                'icon' => 'required|string|max:255|min:3',
                'job_num' => 'required|integer',

            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
        }
        $row->update($request->except(['_token']));
        return response()->json('Data Has Been Updated Successfully');
    }
    public function destroy($id)
    {
        if ($row = Category::find($id)) {
            $row->delete();
            return response()->json('Data Has Been Deleted Successfully');
        }
        return response()->json('Data Not Found');
    }
}
