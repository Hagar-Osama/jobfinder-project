@extends('backend_layouts.layout')
@section('title')
Edit | About
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>About Edit</h2>
            <div>
                <form action="{{route('abouts.update',['about'=>$about->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name" value="{{$about->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Job Title:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="about job_title" name="job_title" value="{{$about->job_title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$about->description}}</textarea>
                    </div>
                    @if(! empty($about->image))
                    <div class="form-group">
                        <img src="{{asset('images/about').'/'.$about->image}}" height="300px" width="300px">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Image:</label>
                        <input type="file" name="image" value="{{$about->image}}">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
