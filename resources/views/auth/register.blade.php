@extends('layouts.layout')
@section('title')
Home | Register
@endsection
@section('contact')
<section class="page-section" id="register">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Register</h2>
        </div>
        <div class="row text-center">

            <div class="col-md-8 offset-2">
                <form action ="{{url('register')}}" method ="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" name ="name">
                    </div>
                    @error('name')
                    <div class = "alert alert-danger">
                        {{$message}}
                    </div>
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
                    @enderror
                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    @error('email')
                    <div class = "alert alert-danger">
                        {{$message}}
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
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Re-Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name ="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

            </div>
        </div>

    </div>
</section>
@endsection
