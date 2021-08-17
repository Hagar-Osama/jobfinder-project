@extends('backend_layouts.layout')
@section('title')
Create | About
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-md-4">

            <h2>About Create</h2>
            <div>
                <form action="{{route('abouts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="about name" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Job Title:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="about job_title" name="job_title" value="{{old('job_title')}}">
                    </div>
                    @error('job_title')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Image:</label>
                        <input type="file" name="image">
                    </div>
                    @error ('image')
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
