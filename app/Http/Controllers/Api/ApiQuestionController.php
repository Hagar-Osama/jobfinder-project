<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiQuestionController extends Controller
{
    public function index()
    {
        $data = Question::get();
        return QuestionResource::collection($data);
    }
    public function show($id)
    {
        $question = Question::findorfail($id);

        return new QuestionResource($question);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'question' => 'required|string|max:255|min:3|unique:questions,question',
            'answer' => 'required|string|max:3000|min:3',
            'status'=> 'required|in:on,off'

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        Question::create($request->except(['_token']));
        return response()->json('Question Has Been Added Successfully');
    }
    public function update(Request $request, $id)
    {
        if($row = Question::find($id)) {
            $validate = Validator::make($request->all(),[
                'question' => 'required|string|max:255|min:3|unique:questions,question,'.$id,
                'answer' => 'required|string|max:3000|min:3',
                'status'=> 'required|in:on,off'

            ]);
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }
            $row->update($request->except(['_token']));
            return response()->json('Question Has Been updated Successfully');
        }

    }
    public function destroy($id)
    {
        if ($row = Question::find($id)) {
            $row->delete();
            return response()->json('Question Has Been Deleted Successfully');

        }
        return response()->json('404');
    }
}
