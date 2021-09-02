@extends('backend_layouts.layout')
@section('title')
Show | Job
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <h2>Jobs</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Salary</th>
                            <th>Description</th>
                            <th>Company Name</th>
                            <th>Category Name</th>
                            <th>Type Name</th>
                            <th>Job Location</th>
                            <th>Company Image</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->salary}}</td>
                            <td>{{$job->description}}</td>
                            <td>@if (!empty($job->company)) {{$job->company->name }} @endif</td>
                            <td>@if (!empty($job->category)) {{$job->category->name }} @endif</td>
                            <td>@if (!empty($job->type)) {{$job->type->name }} @endif</td>
                            <td>@if (!empty($job->location)) {{$job->location->country }} @endif</td>
                            <td> <img src="{{asset('images/jobs').'/'.$job->image}}" height="100px" width="100px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

@endsection
