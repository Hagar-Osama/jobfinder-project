@extends('backend_layouts.layout')
@section('title')
Dashboard | Jobs
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class='text-right'>
                <a href="{{route('jobs.create')}}" class="btn btn-primary">Create New Job</a>
            </div>
            @include('includes.alert')

            <h2>Jobs</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Salary</th>
                            <th>Company Name</th>
                            <th>Category Name</th>
                            <th>Type Name</th>
                            <th>Job Location</th>
                            <th>Company Image</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($jobs)
                        @if($jobs->count() > 0)
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->salary}}</td>
                            <td>@if (!empty($job->company))  {{$job->company->name }} @endif</td>
                            <td>@if (!empty($job->category))  {{$job->category->name }} @endif</td>
                            <td>@if (!empty($job->type))  {{$job->type->name }} @endif</td>
                            <td>@if (!empty($job->location))  {{$job->location->country }} @endif</td>
                            <td> <img src="{{asset('images/jobs').'/'.$job->image}}" height="100px" width="100px"></td>

                            <td><a href="{{route('jobs.show',['job'=>$job->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('jobs.edit',['job'=>$job->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('jobs.destroy', ['job'=>$job->id])}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" name="delete" value = "Delete" class="btn btn-danger">

                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
