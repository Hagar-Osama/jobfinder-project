@extends('layouts.layout')
@section('services')
<div class="site-section site-block-feature bg-light">
    <div class="container">
        <div class="text-center mb-5 section-heading">
            <h2>Why Choose Us</h2>
        </div>
        <div class="d-block d-md-flex border-bottom">
            @isset($services)
            @if($services->count() > 0)
            @foreach($services as $service)
            <div class="text-center p-4 item border-right aos-init aos-animate " data-aos="fade">

                <span class="{{$service->icon}} display-3 mb-3 d-block text-primary"></span>
                <h2 class="h4">{{$service->name}}</h2>
                <p>{{$service->description}}</p>
                <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    </div>
</div>
@endsection
