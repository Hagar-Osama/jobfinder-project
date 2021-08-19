@extends('backend_layouts.layout')
@section('title')
Show | Questions
@endsection
@section('content')
<div class = "text-center">
{{$question->id}}
<br>
{{$question->question}}
<br>
{{$question->answer}}
<br>
{{$question->status}}
</div>
@endsection
