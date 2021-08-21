@extends('backend_layouts.layout')
@section('title')
Show | Company
@endsection
@section('content')
<div class = 'text-center'>
{{$company->id}}
<br>
{{$company->name}}
<br>
{{$company->email}}
<br>
{{$company->phone}}
<br>
{{$company->location}}
</div>
@endsection
