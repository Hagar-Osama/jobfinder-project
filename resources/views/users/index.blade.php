@extends('backend_layouts.layout')
@section('title')
Dashboard | User
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class='text-right'>
                <a href="{{route('users.create')}}" class="btn btn-primary">Create New User</a>
            </div>
            @include('includes.alert')

            <h2>Users</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Testimony Description</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                        @if($users->count() > 0)
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->job_title}}</td>
                            <td>@foreach ($user->testimonies as $testimony)
                                {{$testimony->description}} @endforeach
                            </td>
                            <td><a href="{{route('users.show',['user'=>$user->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('users.destroy', ['user'=>$user->id])}}" method="POST">
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
