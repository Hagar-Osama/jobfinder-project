@extends('backend_layouts.layout')
@section('title')
Create | Categories
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-md-4">

            <h2>Category Create</h2>
            <div>
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category name" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Icon:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category icon" name="icon" value="{{old('icon')}}">
                    </div>
                    @error('icon')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Job Number:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category job_num" name="job_num" value="{{old('job_num')}}">
                    </div>
                    @error('job_num')
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
