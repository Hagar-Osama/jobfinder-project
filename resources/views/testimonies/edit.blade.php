@extends('backend_layouts.layout')
@section('title')
Edit | Testimony
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <h2>testimony Edit</h2>
            <div>
                <form action="{{route('testimonies.update',['testimony'=>$testimony->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">User ID:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="user id" name="user_id" value="{{$testimony->user_id}}">
                    </div>
                    @error('job')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$testimony->description}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    @if(! empty($testimony->image))
                    <div class="form-group">
                        <img src="{{asset('images/testimonies').'/'.$testimony->image}}" height="300px" width="300px">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Image:</label>
                        <input type="file" name="image" value="{{$testimony->image}}">
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
