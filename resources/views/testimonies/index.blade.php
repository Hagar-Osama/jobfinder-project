@extends('backend_layouts.layout')
@section('title')
Dashboard | Testimony
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class='text-right'>
                <a href="{{route('testimonies.create')}}" class="btn btn-primary">Create New testimony</a>
            </div>
            @include('includes.alert')

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
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($testimonies)
                        @if($testimonies->count() > 0)
                        @foreach($testimonies as $testimony)
                        <tr>
                            <td>{{$testimony->id}}</td>
                            <td>{{$testimony->user->name}}</td>
                            <td>{{$testimony->user->job_title}}</td>
                            <td>{{$testimony->description}}</td>
                            <td>{{$testimony->image}}</td>
                            <td><a href="{{route('testimonies.show',['testimony'=>$testimony->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('testimonies.edit',['testimony'=>$testimony->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('testimonies.destroy', ['testimony'=>$testimony->id])}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">

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
