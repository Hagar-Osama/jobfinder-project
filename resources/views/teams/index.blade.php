@extends('backend_layouts.layout')
@section('title')
Dashboard | Team
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class='text-right'>
                <a href="{{route('teams.create')}}" class="btn btn-primary">Create New Team</a>
            </div>
            @include('includes.alert')

            <h2>Team</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>image</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($teams)
                        @if($teams->count() > 0)
                        @foreach($teams as $team)
                        <tr>
                            <td>{{$team->id}}</td>
                            <td>{{$team->name}}</td>
                            <td>{{$team->job_title}}</td>
                            <td>{{$team->image}}</td>
                            <td><a href="{{route('teams.show',['team'=>$team->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('teams.edit',['team'=>$team->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('teams.destroy', ['team'=>$team->id])}}" method="POST">
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
