<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::get();
        return view('abouts.index', ['abouts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abouts.create');
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
            'name' => 'required|string|max:255|min:3|unique:abouts,name',
            'job_title' => 'required|string|max:255|min:3',
            'description' => 'required|string',

        ]);
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'
            ]);
            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images/about', $image_name);
        }
        About::create([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'description' => $request->description,
            'image' => $image_name
        ]);
        return redirect()->route('abouts.index')->with('success', 'About Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = About::findOrFail($id);
        return view('abouts.show', ['about' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = About::find($id);
        return view('abouts.edit', ['about' => $row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($row = About::find($id)) {

            $request->validate([
                'name' => 'required|string|max:255|min:3|unique:abouts,name,'.$id,
                'job_title' => 'required|string|max:255|min:3',
                'description' => 'required|string',

            ]);
            $data = $request->except(['_token']);
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $request->validate([
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'
                ]);
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('images/about', $image_name);
            }
            $data['image'] = $image_name;
            if ($row->image) {
                unlink('images/about/'. $row->image);
            }
        }
        $row->update($data);
        return redirect()->route('abouts.index')->with('success', 'About Has Been updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($row = About::find($id)) {
            if ($row->image) {
                unlink('images/about/'. $row->image);
            }
            return ($row->delete()) ? redirect()->route('abouts.index') : abort('404');
        }
    }
}
