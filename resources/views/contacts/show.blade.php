@extends('backend_layouts.layout')
@section('title')
Show | Contact
@endsection
@section('content')
<div class = 'text-center'>

{{$contact->id}}
<br>
{{$contact->name}}
<br>
{{$contact->email}}
<br>
{{$contact->phone}}
</div>
@endsection
