@extends('backend_layouts.layout')
@section('title')
Show | Location
@endsection
@section('content')
<div class = "text-center">
{{$location->id}}
<br>
{{$location->country}}
<br>
{{$location->state}}
<br>
{{$location->city}}
</div>
@endsection
