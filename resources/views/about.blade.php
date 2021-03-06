@extends('layouts.layout')
@section('about')

<div style="height: 113px;"></div>

<div class="unit-5 overlay" style="background-image: url('assets/images/hero_1.jpg');">
    <div class="container text-center">
        <h2 class="mb-0">About Us</h2>
        <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>About Us</span></p>
    </div>
</div>


<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-5 mb-md-0">

                <div class="img-border">
                    <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                        <span class="icon-wrap">
                            <span class="icon icon-play"></span>
                        </span>
                        <img src="{{asset('assets/images/hero_1.jpg')}}" alt="Image" class="img-fluid rounded">
                    </a>
                </div>

            </div>
            <div class="col-md-5 ml-auto">
                <div class="text-left mb-5 section-heading">
                    <h2>About Us</h2>
                </div>
                @isset($abouts)
                @if($abouts->count() > 0)
                 @foreach($abouts as $about)
                <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;{{$about->description}}&rdquo;</p>
                <p>&mdash; <strong class="text-black font-weight-bold">{{$about->name}}</strong>, {{$about->job_title}}</p>
                <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    </div>
</div>



<!-- END section -->





@endsection
