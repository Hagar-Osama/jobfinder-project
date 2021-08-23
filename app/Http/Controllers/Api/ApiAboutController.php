<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiAboutController extends Controller
{
    public function index()
    {
        $data = About::get();
        return AboutResource::collection($data);
    }
    public function show($id)
    {
        $about = About::findorfail($id);
        // return response()->json($about);

        return new AboutResource($about);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3|unique:abouts,name',
            'job_title' => 'required|string|max:255|min:3',
            'description' => 'required|string',

        ]);
        if ($request->hasfile('image')) {
            $validate = Validator::make($request->all(), [
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'
            ]);
            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images/about', $image_name);

            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
            About::create([
                'name' => $request->name,
                'job_title' => $request->job_title,
                'description' => $request->description,
                'image' => $image_name
            ]);
        }
        return response()->json('Data Has Been Stored Successfully');
    }

    public function update(Request $request, $id)
    {
        if ($row = About::find($id)) {
            //validations
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:255|min:3|unique:abouts,name,' . $id,
                'job_title' => 'required|string|max:255|min:3',
                'description' => 'required|string',

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
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('images/about', $image_name);
            }

            $data['image'] = $image_name;
            if ($row->image) {
                unlink('images/about/' . $row->image);
            }
        }
        $row->update($data);
        return response()->json('Data Has Been Updated Successfully');
    }
    public function destroy($id)
    {
        if ($row = About::find($id)) {
            if ($row->image) {

                unlink('images/about/' . $row->image);
            }
            $row->delete();
            return response()->json('Data Has Been Deleted Successfully');
        }
        return response()->json('Data Not Found');
    }
}
