@extends('backend_layouts.layout')
@section('title')
Create | Job
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <h2>Job Create</h2>
            <div>
                <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="job title" name="title" value="{{old('title')}}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Salary:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="salary" name="salary" value="{{old('salary')}}">
                    </div>
                    @error('salary')
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
                        <label for="exampleFormControlInput1">Category ID:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category id" name="category_id" value="{{old('category_id')}}">
                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Company ID:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="company id" name="company_id" value="{{old('company_id')}}">
                    </div>
                    @error('company_id')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Type ID:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="type id" name="type_id" value="{{old('type_id')}}">
                    </div>
                    @error('type_id')
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
                    <br>
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
