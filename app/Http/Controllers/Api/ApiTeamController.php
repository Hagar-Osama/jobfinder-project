<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTeamController extends Controller
{
    public function index()
    {
        $data = Team::get();
        return TeamResource::collection($data);
    }
    public function show($id)
    {
        $team = Team::findorfail($id);

        return new TeamResource($team);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3|unique:teams,name',
            'job_title' => 'required|string|max:255|min:3',


        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

            ]);

            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images/team', $image_name);

            Team::create([
                "name" => $request->name,
                "job_title" => $request->job_title,
                "image" => $image_name

            ]);
        }
        return response()->json('Data Has Been Stored Successfully');
    }
    public function update(Request $request, $id)
    {
        if ($row = Team::find($id)) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:255|min:3|unique:teams,name,' . $id,
                'job_title' => 'required|string|max:255|min:3',


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
                $image->move('images/team', $image_name);
                $data['image'] = $image_name;
                if ($row->image) {
                    unlink('images/team/'.$row->image);
                }
            }
        }
        $row->update($data);
        return response()->json('Data Has Been Updated Successfully');
    }
    public function destroy($id)
    {
        if ($row = Team::find($id)) {
            if ($row->image) {

                unlink('images/team/' . $row->image);
            }
            $row->delete();
            return response()->json('Data Has Been Deleted Successfully');
        }
        return response()->json('Data Not Found');
    }
}
