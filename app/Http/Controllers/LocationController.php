<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Location::get();
        return view('locations.index',['locations'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
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
            'country'=>'required|string|max:20|min:4',
            'state'=>'required|string|max:20|min:4',
             'city'=> 'required|string|min:4|max:20',
             'job_id'=> 'required|integer'

        ]);
        Location::create($request->except(['_token']));
        return redirect()->route('locations.index')->with('success', 'Location Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $row = Location::findorfail($id);
       return view('locations.show', ['location' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $row = Location::find($id);
        return view('locations.edit', ['location'=>$row]);
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
       if ($row = Location::find($id)) {
           //validations
        $request->validate([
            'country'=>'required|string|max:20|min:4',
            'state'=>'required|string|max:20|min:4',
             'city'=> 'required|string|min:4|max:20',
             'job_id'=> 'required|integer'

        ]);

        $row->update($request->except(['_token','_method']));
        return redirect()->route('locations.index')->with('success', 'Location Has Been Updated Successfully');

       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($row = Location::find($id)) {
            $row->delete();
            return redirect()->route('locations.index')->with('success', 'Location Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
