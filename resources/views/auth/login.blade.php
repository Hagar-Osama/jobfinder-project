@extends('layouts.layout')
@section('title')
Home | Login
@endsection
@section('contact')
<div style="height: 113px;"></div>

<div class="unit-5 overlay" style="background-image: url('assets/images/hero_1.jpg');">
    <div class="container text-center">
        <h2 class="mb-0">Log In</h2>
    </div>
</div>
</div>
<section class="page-section" id="login">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-8 offset-2">
                <form action = "{{url('login')}}" method = "POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><b>Email address</b></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    @error('email')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name = "remember">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

            </div>
        </div>

    </div>
</section>
@endsection
