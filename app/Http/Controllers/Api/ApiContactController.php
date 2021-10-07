<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiContactController extends Controller
{
    
    public function index()
    {
        $data = Contact::get();
        return ContactResource::collection($data);
    }
  
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|string|max:255|min:3',
            'phone' => 'required|integer',
            'message' => 'required|string',
            'email' =>'required|string|max:255|unique:contacts,email'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Contact::create($request->except(['_token']));
        return response()->json('Message Has been submitted Successfully');
    }
    
}
