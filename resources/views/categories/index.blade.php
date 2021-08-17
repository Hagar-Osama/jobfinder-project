@extends('backend_layouts.layout')
@section('title')
Dashboard | Categories
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-md-4">
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('categories.create')}}" class="btn btn-primary">Create New Category</a>
            </div>
            <h2>Categories</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job Number</th>
                            <th>Icon</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($categories)
                        @if($categories->count() > 0)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>@if(empty($category->icon))
                                No Icon</td>
                            <td>@else
                            {{$category->icon}}
                            @endif</td>
                           <td>{{$category->job_num}}</td>
                            <td><a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('categories.destroy', ['category'=>$category->id])}}" method="POST">
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
