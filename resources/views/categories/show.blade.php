@extends('backend_layouts.layout')
@section('title')
Show | Categories
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-md-4">
            <h2>Categories</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job Number</th>
                            <th>Icon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>@if(empty($category->icon))
                            No Icon</td>
                        <td>@else
                            {{$category->icon}}
                            @endif
                        </td>
                        <td>{{$category->job_num}}</td>
                        </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
