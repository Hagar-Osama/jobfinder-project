@extends('backend_layouts.layout')
@section('title')
Show | Categories
@endsection
@section('content')
<div class = 'text-center'>
{{$category->id}}
<br>
{{$category->name}}
<br>
{{$category->icon}}
<br>
{{$category->job_num}}
</div>
@endsection
