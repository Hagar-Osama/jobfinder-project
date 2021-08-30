@extends('backend_layouts.layout')
@section('title')
Dashboard | Services
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('services.create')}}" class="btn btn-primary">Create New Service</a>
            </div>
            <h2>Services</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Icon</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($services)
                        @if($services->count() > 0)
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->name}}</td>
                            <td>@if(empty($service->icon))
                                No Icon</td>
                            <td>@else
                            {{$service->icon}}
                            @endif</td>
                            <td>{{$service->status}}</td>
                            <td><a href="{{route('services.show',['service'=>$service->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('services.edit',['service'=>$service->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('services.destroy', ['service'=>$service->id])}}" method="POST">
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
