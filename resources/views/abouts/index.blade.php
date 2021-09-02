@extends('backend_layouts.layout')
@section('title')
Dashboard | About
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-md-4">
            <div class='text-right'>
                <a href="{{route('abouts.create')}}" class="btn btn-primary">Create New About</a>
            </div>
            @include('includes.alert')
            <h2>About</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Image</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($abouts)
                        @if($abouts->count() > 0)
                        @foreach($abouts as $about)
                        <tr>
                            <td>{{$about->id}}</td>
                            <td>{{$about->name}}</td>
                            <td>{{$about->job_title}}</td>
                            <td> <img src="{{asset('images/about').'/'.$about->image}}" height="100px" width="100px">
                           <td><a href="{{route('abouts.show',['about'=>$about->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('abouts.edit',['about'=>$about->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('abouts.destroy', ['about'=>$about->id])}}" method="POST">
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
