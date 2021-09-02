@extends('backend_layouts.layout')
@section('title')
Show | Team
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <h2>Team</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$team->id}}</td>
                            <td>{{$team->name}}</td>
                            <td>{{$team->job_title}}</td>
                            <td> <img src="{{asset('images/team').'/'.$team->image}}" height="100px" width="100px">
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
