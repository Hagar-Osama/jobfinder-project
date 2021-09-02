<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Job::select('id', 'title', 'salary', 'image', 'company_id', 'category_id', 'type_id')->get();
        //  foreach ($data as $item) {
        //     dd($item->company);
        // }
        return view('jobs.index', ['jobs' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('jobs.create');
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
            'title'=>'required|string|max:255|min:3|unique:jobs,title',
             'description'=> 'required|string|max:3000|min:3',
              'salary' => 'required|string',
              'category_id' =>'required|integer',
              'company_id' => 'required|integer',
              'type_id' => 'required|integer',


        ]);
        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

            ]);

        $image = $request->file('image');
        $image_name = rand(). '.' .$image->getClientOriginalExtension();
        $image->move('images/jobs', $image_name);

        Job::create([
            "title" => $request->title,
            'description'=> $request->description,
            'salary' => $request->salary,
            'category_id' =>$request->category_id,
            'company_id' => $request->company_id,
            'type_id' =>  $request->type_id,
             "image" => $image_name

        ]);
    }
        return redirect()->route('jobs.index')->with('success', 'Job Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Job::FindOrFail($id);
        return view('jobs.show', ['job' =>$row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Job::Find($id);
        return view('jobs.edit', ['job' =>$row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($row = Job::find($id)) {
            //validations
      $request->validate([
          'title'=>'required|string|max:255|min:3|unique:jobs,title,'.$id,
          'description'=> 'required|string|max:3000|min:3',
          'salary' => 'required|string',
          'category_id' =>'required|integer',
          'company_id' => 'required|integer',
          'type_id' => 'required|integer',

      ]);
      $data = $request->except(['image', '_token']);
      if($request->hasfile('image')) {
          $image = $request->file('image');
          $request->validate([
              'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

          ]);
          $image_name = rand(). '.' .$image->getClientOriginalExtension();
          $image->move('images/jobs', $image_name);
          $data['image'] = $image_name;
          if($row->image) {
              unlink('images/jobs/'.$row->image);
          }
      }
  }
     $row->update($data);
      return redirect()->route('jobs.index')->with('success', 'Jobs Has Been Updated Successfully');
  }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($row = Job::find($id)) {
            if ($row->image) {

                unlink('images/jobs/'.$row->image);
            }
            $row->delete();
            return redirect()->route('jobs.index')->with('success', 'Job Has Been Deleted Successfully');


        }
        return abort('404');
    }
}
