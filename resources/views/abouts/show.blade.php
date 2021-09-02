@extends('backend_layouts.layout')
@section('title')
Show | About
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-md-4">
            <h2>About</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$about->id}}</td>
                            <td>{{$about->name}}</td>
                            <td>{{$about->job_title}}</td>
                            <td> <img src="{{asset('images/about').'/'.$about->image}}" height="100px" width="100px">
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
