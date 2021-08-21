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
      <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="100">
        <a href="#" class="person">
          <img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder">
          <h2>Michelle Megan</h2>
          <p>CEO, Co-founder</p>
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="200">
        <a href="#" class="person">
          <img src="{{asset('assets/images/person_2.jpg')}}" alt="Image placeholder">
          <h2>Mike Stellar</h2>
          <p>CTO Co-founder</p>
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="300">
        <a href="#" class="person">
          <img src="{{asset('assets/images/person_3.jpg')}}" alt="Image placeholder">
          <h2>Gregg White</h2>
          <p>VP Producer</p>
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="400">
        <a href="#" class="person">
          <img src="{{asset('assets/images/person_4.jpg')}}" alt="Image placeholder">
          <h2>Rogie Knitt</h2>
          <p>Project Manager</p>
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="500">
        <a href="#" class="person">
          <img src="{{asset('assets/images/person_1.jpg')}}" alt="Image placeholder">
          <h2>Ben Koh</h2>
          <p>Project Manager</p>
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 col-12" data-aos="fade" data-aos-delay="600">
        <a href="#" class="person">
          <img src="{{asset('assets/images/person_2.jpg')}}" alt="Image placeholder">
          <h2>Chris Stanworth</h2>
          <p>Product Designer</p>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
