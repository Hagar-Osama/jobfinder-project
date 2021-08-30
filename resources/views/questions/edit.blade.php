@extends('backend_layouts.layout')
@section('title')
Edit | Questions
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <h2>Question Edit</h2>
            <div>
                <form action="{{route('questions.update',['question'=>$question->id])}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Question:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="question " name="question" value="{{$question->question}}">
                    </div>
                    @error('question')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Answer:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="answer" name="answer" value="{{$question->answer}}">
                    </div>
                    @error('answer')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="on" @if($question->status=='on') selected @else "" @endif>On</option>
                            <option value="off" @if($question->status=='off') selected @else ""@endif>Off</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
