@extends('backend_layouts.layout')
@section('title')
Show | testimony
@endsection
@section('content')
<div class = 'text-center'>
{{$testimony->id}}
<br>
{{$testimony->user_id}}
<br>
{{$testimony->description}}
<br>
{{$testimony->image}}
</div>
@endsection
