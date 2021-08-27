<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiServiceController extends Controller
{
    public function index()
    {
        $data = Service::get();
        return ServiceResource::collection($data);
    }
    public function show($id)
    {
        $service = Service::findorfail($id);

        return new ServiceResource($service);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|string|max:255|min:3|unique:services,name',
            'icon'=>'required|string|max:255|min:3',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Service::create($request->except(['_token']));
        return response()->json('Service Has Been Created Successfully');
    }
    public function update(Request $request, $id)
    {
       if ($row = Service::find($id)) {
         //  dd($id);
           //validations
        $validate = Validator::make($request->all(),[
            'name'=>'required|string|max:255|min:3|unique:services,name,'.$id,
            'icon'=>'required|string|max:255|min:3',
             'description'=> 'required|string',
             'status'=> 'required|in:on,off'

        ]);

        $row->update($request->except(['_token','_method']));
        return response()->json('Service Has Been Updated Successfully');

       } 

    }
    public function destroy($id)
    {
        if($row = Service::find($id)) {
            $row->delete();
            return response()->json('Service Has Been Deleted Successfully');
        }
        return response()->json('404');
    }

}
