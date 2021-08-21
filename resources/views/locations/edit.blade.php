@extends('backend_layouts.layout')
@section('title')
Edit | Location
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <h2>Location Edit</h2>
            <div>
                <form action="{{route('locations.update', ['location'=>$location->id])}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Country:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="country" name="country" value="{{$location->country}}">
                    </div>
                    @error('country')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">state:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="state" name="state" value="{{$location->state}}">
                    </div>
                    @error('state')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">City:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="city" name="city" value="{{$location->city}}">
                    </div>
                    @error('city')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Job_ID:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="job id" name="job_id" value="{{$location->job_id}}">
                    </div>
                    @error('job_id')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{${message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
