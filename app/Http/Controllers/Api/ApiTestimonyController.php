<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonyResource;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTestimonyController extends Controller
{
    public function index()
    {
        $data = Testimony::get();
        return TestimonyResource::collection($data);
    }
    public function show($id)
    {
        $testimony = Testimony::findorfail($id);

        return new TestimonyResource($testimony);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'description' => 'required|string|max:255|min:3',
            'user_id' => 'required|integer',


        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        if ($request->hasfile('image')) {
            $validate = validator::make($request->all(), [
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

            ]);

            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images/testimonies', $image_name);

            Testimony::create([
                "description" => $request->description,
                "user_id" => $request->user_id,
                "image" => $image_name

            ]);
        }
        return response()->json('Data Has Been Stored Successfully');
    }
    public function update(Request $request, $id)
    {
        if ($row = Testimony::find($id)) {
            $validate = Validator::make($request->all(), [
                'description' => 'required|string|max:255|min:3',
                'user_id' => 'required|integer',

            ]);
            $data = $request->except(['_token']);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $validate = Validator::make($request->$request->all(), [
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

                ]);

                if ($validate->fails()) {
                    return response()->json($validate->errors());
                }
                $image_name = rand(). '.' .$image->getClientOriginalExtension();
                $image->move('images/testimonies', $image_name);
                $data['image'] = $image_name;
                if ($row->image) {
                    unlink('images/testimonies/'.$row->image);
                }
            }
        }
        $row->update($data);
        return response()->json('Data Has Been Updated Successfully');
    }
    public function destroy($id)
    {
        if ($row = Testimony::find($id)) {
            if ($row->image) {

                unlink('images/Testimonies/' . $row->image);
            }
            $row->delete();
            return response()->json('Data Has Been Deleted Successfully');
        }
        return response()->json('Data Not Found');
    }
}
