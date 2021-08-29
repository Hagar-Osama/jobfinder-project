@extends('layouts.layout')
@section('team')
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <!-- <div class="col-md-7 text-center"> -->
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5">The Team</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum magnam illum maiores adipisci pariatur, eveniet.</p>
            </div>

            <!-- </div> -->
        </div>
        <div class="row team">
            @isset($teams)
            @if($teams->count() > 0)
            @foreach($teams as $team)
            <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="100">
                <a href="#" class="person">
                    <img src="images/team/{{$team->image}}" alt="Image placeholder">
                    <h2>{{$team->name}}</h2>
                    <p>{{$team->job_title}}</p>
                </a>
            </div>
            @endforeach
            @endif
            @endisset


        </div>
    </div>
</div>
@endsection
