@extends('backend_layouts.layout')
@section('title')
Show | Company
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <h2>Companies</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Job Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->location}}</td>
                            <td> @foreach ($company->jobs as $job)
                                {{ $job->name}}
                                @endforeach
                            </td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
