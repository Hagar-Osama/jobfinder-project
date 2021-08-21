@extends('backend_layouts.layout')
@section('title')
Show | Job
@endsection
@section('content')
<div class = "text-center">
{{$job->id}}
<br>
{{$job->title}}
<br>
{{$job->salary}}
<br>
{{$job->description}}
<br>
{{$job->company->name}}
</div>
@endsection
