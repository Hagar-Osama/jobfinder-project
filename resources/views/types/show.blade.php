@extends('backend_layouts.layout')
@section('title')
Show | Job Type
@endsection
@section('content')
<div class = 'text-center'>
{{$type->id}}
<br>
{{$type->name}}
</div>
@endsection
