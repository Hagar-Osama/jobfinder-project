@extends('backend_layouts.layout')
@section('title')
Dashboard | Locations
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('locations.create')}}" class="btn btn-primary">Create New Location</a>
            </div>
            <h2>Locations</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>country</th>
                            <th>State</th>
                            <th>city</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($locations)
                        @if($locations->count() > 0)
                        @foreach($locations as $location)
                        <tr>
                            <td>{{$location->id}}</td>
                            <td>{{$location->country}}</td>
                            <td>{{$location->state}}</td>
                            <td>{{$location->city}}</td>
                            <td><a href="{{route('locations.edit',['location'=>$location->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('locations.destroy', ['location'=>$location->id])}}" method="POST">
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
