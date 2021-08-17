<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::get();
        return view('categories.index', ['categories' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name'=>'required|string|max:255|min:3|unique:categories,name',
            'icon'=>'required|string|max:255|min:3',
             'job_num'=> 'required|integer',

        ]);
        Category::create($request->except(['_token']));
        return redirect()->route('categories.index')->with('success', 'category Has Been Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Category::findOrFail($id);
        return view('categories.show', ['category' => $row]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Category::find($id);
        return view('categories.edit', ['category' => $row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request);
        if($row = Category::find($id)) {
            $request->validate([
                'name'=>'required|string|max:255|min:3|unique:categories,name,'. $id,
                'icon'=>'required|string|max:255|min:3',
                 'job_num'=> 'required|integer',

            ]);
            $row->update($request->except(['_token']));
            return redirect()->route('categories.index')->with('success', 'category Has Been updated Successfully');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($row = Category::find($id)) {
            $row->delete();
            return redirect()->route('categories.index')->with('success', 'category Has Been Deleted Successfully');

        }
        return abort('404');
    }
}
