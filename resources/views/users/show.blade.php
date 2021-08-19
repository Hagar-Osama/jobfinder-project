@extends('backend_layouts.layout')
@section('title')
Show | User
@endsection
@section('content')
<div class = 'text-center'>
{{$user->id}}
<br>
{{$user->name}}
<br>
{{$user->email}}
<br>
{{$user->phone}}
<br>
{{$user->job_title}}
</div>
@endsection
