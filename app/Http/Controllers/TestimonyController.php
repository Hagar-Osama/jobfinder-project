<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Testimony::select('id', 'description', 'user_id', 'image')->get();
        return view('testimonies.index', ['testimonies' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required|string|max:255|min:3',
             'user_id'=> 'required|integer',


        ]);
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

            ]);

        $image = $request->file('image');
        $image_name = rand(). '.' .$image->getClientOriginalExtension();
        $image->move('images/testimonies', $image_name);

        Testimony::create([
            "description" => $request->description,
            "user_id" => $request->user_id,
            "image" => $image_name

        ]);
    }
        return redirect()->route('testimonies.index')->with('success', 'Testimony Has Been Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Testimony::findorfail($id);
        return view('testimonies.show', ['testimony' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Testimony::find($id);

        return view('testimonies.edit', ['testimony'=>$row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($row = Testimony::find($id)) {
            $request->validate([
                'description'=>'required|string|max:255|min:3',
                 'user_id'=> 'required|integer',
            ]);
            $data = $request->except(['image', '_token']);
            if($request->hasfile('image')) {
                $image = $request->file('image');
                $request->validate([
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

                ]);
                $image_name = rand(). '.' .$image->getClientOriginalExtension();
                $image->move('images/testimonies', $image_name);
                $data['image'] = $image_name;
                if($row->image) {
                    unlink('images/testimonies/'.$row->image);
                }
            }

        }
        $row->update($data);
        return redirect()->route('testimonies.index')->with('success', 'Testimony Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($row = Testimony::find($id)) {
            if ($row->image) {

                unlink('images/testimonies/'.$row->image);
            }
            $row->delete();
            return redirect()->route('testimonies.index')->with('success', 'Testimony Has Been Deleted Successfully');


        }
        return abort('404');
    }
}
