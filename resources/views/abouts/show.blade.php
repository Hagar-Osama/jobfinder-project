@extends('backend_layouts.layout')
@section('title')
Show | About
@endsection
@section('content')
<div class = 'text-center'>
{{$about->id}}
<br>
{{$about->name}}
<br>
{{$about->job_title}}
<br>
{{$about->description}}
<br>
</div>
@endsection
