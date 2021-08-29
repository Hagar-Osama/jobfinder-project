<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Question::get();
        return view('questions.index', ['questions' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');

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
            'question' => 'required|string|max:255|min:3|unique:questions,question',
            'answer' => 'required|string|max:3000|min:3',
            'status'=> 'required|in:on,off'

        ]);
        Question::create($request->except(['_token']));
        return redirect()->route('questions.index')->with('success', 'Question Has Been Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Question::findOrFail($id);
        return view('questions.show', ['question' => $row]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Question::find($id);
        return view('questions.edit', ['question' => $row]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($row = Question::find($id)) {
            $request->validate([
                'question' => 'required|string|max:255|min:3|unique:questions,question,'.$id,
                'answer' => 'required|string|max:3000|min:3',
                'status'=> 'required|in:on,off'

            ]);
            $row->update($request->except(['_token']));
            return redirect()->route('questions.index')->with('success', 'Question Has Been updated Successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($row = Question::find($id)) {
            $row->delete();
            return redirect()->route('questions.index')->with('success', 'Question Has Been Deleted Successfully');

        }
        return abort('404');
    }
}
