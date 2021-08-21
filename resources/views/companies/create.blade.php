@extends('backend_layouts.layout')
@section('title')
Create | Company
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            </div>
            <h2>Company Create</h2>
            <div>
                <form action="{{route('companies.store')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="company name" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
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
                    <div class = "alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="company phone" name="phone" value="{{old('phone')}}">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Location:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="company location" name="location" value="{{old('location')}}">
                    </div>
                    @error('location')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
