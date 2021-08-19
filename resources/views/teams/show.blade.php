@extends('backend_layouts.layout')
@section('title')
Show | Team
@endsection
@section('content')
<div class = 'text-center'>
{{$team->id}}
<br>
{{$team->name}}
<br>
{{$team->job_title}}
<br>
{{$team->image}}
</div>
@endsection
