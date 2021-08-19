@extends('backend_layouts.layout')
@section('title')
Dashboard | Questions
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('questions.create')}}" class="btn btn-primary">Create New Question</a>
            </div>
            <h2>Questions</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($questions)
                        @if($questions->count() > 0)
                        @foreach($questions as $question)
                        <tr>
                            <td>{{$question->id}}</td>
                            <td>{{$question->question}}</td>
                            <td>{{$question->answer}}</td>
                            <td>{{$question->status}}</td>
                            <td><a href="{{route('questions.edit',['question'=>$question->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('questions.destroy', ['question'=>$question->id])}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" name="delete" value = "Delete" class="btn btn-danger">

                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
