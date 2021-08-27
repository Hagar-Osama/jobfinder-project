<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiJobController extends Controller
{
    public function index()
    {
        $data = Job::get();
        return JobResource::collection($data);
    }
    public function show($id)
    {
        $job = Job::findorfail($id);

        return new JobResource($job);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:3|unique:jobs,title',
            'description' => 'required|string|max:255|min:3',
            'salary' => 'required|integer',
            'category_id' => 'required|integer',
            'company_id' => 'required|integer',
            'type_id' => 'required|integer',

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        $image = $request->file('image');
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move('images/jobs', $image_name);


        Job::create([
            "title" => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'category_id' => $request->category_id,
            'company_id' => $request->company_id,
            'type_id' =>  $request->type_id,
            "image" => $image_name
        ]);
        return response()->json('Data Has Been Stored Successfully');
    }
    public function update(Request $request, $id)
    {
        if ($row = Job::find($id)) {
            //validations
            $validate = Validator::make($request->all(), [
                'title' => 'required|string|max:255|min:3|unique:jobs,title,' . $id,
                'description' => 'required|string|max:255|min:3',
                'salary' => 'required|integer',
                'category_id' => 'required|integer',
                'company_id' => 'required|integer',
                'type_id' => 'required|integer',

            ]);
            $data = $request->except(['_token']);
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $validate = Validator::make($request->all(), [
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

                ]);
                if ($validate->fails()) {
                    return response()->json($validate->errors());
                }
                $image_name = rand(). '.' .$image->getClientOriginalExtension();
                $image->move('images/jobs', $image_name);
                $data['image'] = $image_name;
                if ($row->image) {
                    unlink('images/jobs/'.$row->image);
                }
            }
        }
        $row->update($data);
        return response()->json('Data Has Been Updated Successfully');
    }
    public function destroy($id)
    {
        if ($row = Job::find($id)) {
            if ($row->image) {

                unlink('images/jobs/' . $row->image);
            }
            $row->delete();
            return response()->json('Data Has Been Deleted Successfully');
        }
        return response()->json('Data Not Found');
    }
}
