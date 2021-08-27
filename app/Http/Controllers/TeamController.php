<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Team::select('id', 'name', 'job_title', 'image')->get();
        return view('teams.index', ['teams' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:teams,name',
            'job_title' => 'required|string|max:255|min:3',


        ]);
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
        return redirect()->route('teams.index')->with('success', 'team Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $row = Team::findorfail($id);
        return view('teams.show', ['team' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Team::find($id);
        return view('teams.edit', ['team' => $row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($row = Team::find($id)) {
            //validations
            $request->validate([
                'name' => 'required|string|max:255|min:3|unique:teams,name,' . $id,
                'job_title' => 'required|string|max:255|min:3',
            ]);
            $data = $request->except(['image', '_token']);
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $request->validate([
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

                ]);
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('images/team', $image_name);
                $data['image'] = $image_name;
                if ($row->image) {
                    unlink('images/team/' . $row->image);
                }
            }
        }
        $row->update($data);
        return redirect()->route('teams.index')->with('success', 'team Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($row = Team::find($id)) {
            if ($row->image) {

                unlink('images/team/' . $row->image);
            }
            $row->delete();
            return redirect()->route('teams.index')->with('success', 'team Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
