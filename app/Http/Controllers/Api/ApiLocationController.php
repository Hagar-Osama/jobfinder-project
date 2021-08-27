<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiLocationController extends Controller
{
    public function index()
    {
        $data = Location::get();
        return LocationResource::collection($data);
    }
    public function show($id)
    {
        $location = Location::findorfail($id);

        return new LocationResource($location);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'country' => 'required|string|max:20|min:4',
            'state' => 'required|string|max:20|min:4',
            'city' => 'required|string|min:4|max:20',
            'job_id' => 'required|integer'

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Location::create($request->except(['_token']));
        return response()->json('Location Has Been Created Successfully');
    }
    public function update(Request $request, $id)
    {
        if ($row = Location::find($id)) {
            //validations
            $validate = Validator::make($request->all(), [
                'country' => 'required|string|max:20|min:4',
                'state' => 'required|string|max:20|min:4',
                'city' => 'required|string|min:4|max:20',
                'job_id' => 'required|integer'

            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
        }
        $row->update($request->except(['_token', '_method']));
        return response()->json('Location Has Been Updated Successfully');
    }
    public function destroy($id)
    {
        if ($row = Location::find($id)) {
            $row->delete();
            return response()->json('Location Has Been Deleted Successfully');
        }
        return response()->json('404');
    }
}
