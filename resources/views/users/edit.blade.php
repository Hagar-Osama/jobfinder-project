@extends('backend_layouts.layout')
@section('title')
Edit | User
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            </div>
            <h2>User Edit</h2>
            <div>
                <form action="{{route('users.update', ['user'=>$user->id])}}" method="POST" >
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="user name" name="name" value="{{$user->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name ="password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="user phone" name="phone" value="{{$user->phone}}">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Job Title:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="job title" name="job_title" value="{{old('job_title')}}">
                    </div>
                    @error('job_title')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    @enderror
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Register As </label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                    <option value = "" disabled selected hidden>choose your type</option>
                        <option value="company">Company</option>
                        <option value="person">Person</option>
                    </select>
                </div>
                    @error('type')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{${message}}</span>
                    </div>
                    @enderro
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
