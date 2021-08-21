@extends('backend_layouts.layout')
@section('title')
Dashboard | Job Type
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('types.create')}}" class="btn btn-primary">Create New Job Type</a>
            </div>
            <h2>Job Type</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($types)
                        @if($types->count() > 0)
                        @foreach($types as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td>{{$type->name}}</td>
                            <td><a href="{{route('types.show',['type'=>$type->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('types.edit',['type'=>$type->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('types.destroy', ['type'=>$type->id])}}" method="POST">
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
