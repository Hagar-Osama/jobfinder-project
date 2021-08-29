@extends('layouts.layout')
@section('content')
<div style="height: 113px;"></div>

<div class="site-blocks-cover overlay" style="background-image: url('assets/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
                <h1>Find Job</h1>
                <form action="#">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <input type="text" id="job_name" class="mr-3 form-control border-0 px-4" placeholder="job title, keywords or company name ">
                                    <div id="jobList">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-wrap">
                                        <span class="icon icon-room"></span>
                                        <input type="text" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="city, province or region" onFocus="geolocate()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="small">or browse by category: <a href="#" class="category">Category #1</a> <a href="#" class="category">Category #2</a></p>
                        </div>
                    </div>
                    <div>
                        {{csrf_field()}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5">Popular Categories</h2>
            </div>
        </div>
        <div class="row">
            @isset($categories)
            @if($categories->count() > 0)
            @foreach($categories as $category)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                <a href="#" class="h-100 feature-item">
                    <span class="d-block icon {{$category->icon}} mb-3 text-primary"></span>
                    <h2>{{$category->name}}</h2>
                    <span class="counting">{{$category->job_num}}</span>
                </a>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    </div>
</div>



<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="mb-5 h3">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">

                    <a href="job-single.html" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            <img src="{{asset('assets/images/company_logo_blank.png')}}" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>Restaurant Crew</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> Resto Bar</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> Florida</div>
                                    <div><span class="icon-money mr-1"></span> $55000 &mdash; 70000</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            <div class="p-3">
                                <span class="text-info p-2 rounded border border-info">Full Time</span>
                            </div>
                        </div>
                    </a>

                    <a href="job-single.html" class="job-item d-block d-md-flex align-items-center freelance">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            <img src="{{asset('assets/images/logo_1.png')}}" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>JavaScript Fullstack Developer</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> Cooper</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> Anywhere</div>
                                    <div><span class="icon-money mr-1"></span> $55000 &mdash; 70000</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            <div class="p-3">
                                <span class="text-warning p-2 rounded border border-warning">Freelance</span>
                            </div>
                        </div>
                    </a>


                    <a href="job-single.html" class="job-item d-block d-md-flex align-items-center freelance">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            <img src="{{asset('assets/images/logo_1.png')}}" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>ReactJS Fullstack Developer</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> Cooper</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> Anywhere</div>
                                    <div><span class="icon-money mr-1"></span> $55000 &mdash; 70000</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            <div class="p-3">
                                <span class="text-warning p-2 rounded border border-warning">Freelance</span>
                            </div>
                        </div>
                    </a>


                    <a href="job-single.html" class="job-item d-block d-md-flex align-items-center fulltime">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            <img src="{{asset('assets/images/company_logo_blank.png')}}" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>Assistant Brooker, Real Estate</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> RealState</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> New York</div>
                                    <div><span class="icon-money mr-1"></span> $55000 &mdash; 70000</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            <div class="p-3">
                                <span class="text-info p-2 rounded border border-info">Full Time</span>
                            </div>
                        </div>
                    </a>

                    <a href="job-single.html" class="job-item d-block d-md-flex align-items-center partime">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            <img src="{{asset('assets/images/logo_2.png')}}" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>Telecommunication Manager</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> Think</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> London</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            <div class="p-3">
                                <span class="text-danger p-2 rounded border border-danger">Par Time</span>
                            </div>
                        </div>
                    </a>


                </div>

                <div class="col-md-12 text-center mt-5">
                    <a href="#" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
                </div>
            </div>
            <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex mb-0">
                    <h2 class="mb-5 h3 mb-0">Featured Jobs</h2>
                    <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
                </div>

                <div class="nonloop-block-16 owl-carousel">

                    <div class="border rounded p-4 bg-white">
                        <h2 class="h5">Restaurant Crew</h2>
                        <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                        <p>
                            <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                            <span class="d-block"><span class="icon-room"></span> Florida</span>
                            <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi neque fugit tempora, numquam voluptate veritatis odit id, iste eum culpa alias, ut officiis omnis itaque ad, rem sunt doloremque molestias.</p>
                    </div>

                    <div class="border rounded p-4 bg-white">
                        <h2 class="h5">Javascript Fullstack Developer</h2>
                        <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                        <p>
                            <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                            <span class="d-block"><span class="icon-room"></span> Florida</span>
                            <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus accusamus necessitatibus praesentium voluptate natus excepturi rerum, autem. Magnam laboriosam, quam sapiente laudantium iure sit ea! Tenetur, quasi, praesentium. Architecto, eum.</p>
                    </div>

                    <div class="border rounded p-4 bg-white">
                        <h2 class="h5">Assistant Brooker, Real Estate</h2>
                        <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                        <p>
                            <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                            <span class="d-block"><span class="icon-room"></span> Florida</span>
                            <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus esse, quam consectetur ipsum quibusdam ullam ab nesciunt, doloribus voluptatum neque iure perspiciatis vel vero illo consequatur facilis, fuga nobis corporis.</p>
                    </div>

                    <div class="border rounded p-4 bg-white">
                        <h2 class="h5">Telecommunication Manager</h2>
                        <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                        <p>
                            <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                            <span class="d-block"><span class="icon-room"></span> Florida</span>
                            <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at ipsum commodi hic, cum esse asperiores libero molestiae, perferendis consectetur assumenda iusto, dolorem nemo maiores magnam illo laborum sit, dicta.</p>
                    </div>

                </div>

            </div>
        </div>
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
                        <img src="{{asset('assets/images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
                    </a>
                </div>

            </div>
            <div class="col-md-5 ml-auto">
                <div class="text-left mb-5 section-heading">
                    <h2>Testimonies</h2>
                </div>
                @isset($testimonies)
                @if($testimonies->count() > 0)
                @foreach($testimonies as $testimony)
                <p class="mb-4 h5 font-italic lineheight1-5">&ldquo;{{$testimony->description}}&rdquo;</p>
                <p>&mdash; <strong class="text-black font-weight-bold">{{$testimony->user->name}}</strong>, {{$testimony->user->job_title}}</p>
                <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    </div>
</div>


<div class="site-blocks-cover overlay inner-page" style="background-image: url('assets/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
                <h1 class="h3 mb-0">Your Dream Job</h1>
                <p class="h3 text-white mb-5">Is Waiting For You</p>
                <p><a href="#" class="btn btn-outline-warning py-3 px-4">Find Jobs</a> <a href="#" class="btn btn-warning py-3 px-4">Apply For A Job</a></p>

            </div>
        </div>
    </div>
</div>



<div class="site-section site-block-feature bg-light">
    <div class="container">
        <div class="text-center mb-5 section-heading">
            <h2>Why Choose Us</h2>
        </div>
        <div class="d-block d-md-flex border-bottom">
            @isset($services)
            @if($services->count() > 0)
            @foreach($services as $service)
            <div class="text-center p-4 item border-right" data-aos="fade">
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
