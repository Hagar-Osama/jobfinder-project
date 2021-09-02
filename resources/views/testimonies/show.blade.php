@extends('backend_layouts.layout')
@section('title')
Show | testimony
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <h2>Testimony</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>User Job</th>
                            <th>Description</th>
                            <th>image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$testimony->id}}</td>
                            <td>{{$testimony->user->name}}</td>
                            <td>{{$testimony->user->job_title}}</td>
                            <td>{{$testimony->description}}</td>
                            <td> <img src="{{asset('images/testimonies').'/'.$testimony->image}}" height="100px" width="100px">
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
