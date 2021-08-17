@extends('backend_layouts.layout')
@section('title')
Edit | Categories
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <h2>Category Edit</h2>
            <div>
            <form action = "{{route('categories.update',['category'=>$category->id])}}" method = "POST">
                @csrf
            {{method_field('PUT')}}
  <div class="form-group">
    <label for="exampleFormControlInput1">Name:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category name" name ="name" value = "{{$category->name}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Icon:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category icon" name ="icon" value = "{{$category->icon}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Job Number:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="category job_num" name ="job_num" value = "{{$category->job_num}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>

</form>
            </div>
        </main>
    </div>
</div>

@endsection
