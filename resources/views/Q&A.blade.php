@extends('layouts.layout')
@section('Q&A')
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-6" data-aos="fade">
                <h2>Frequently Ask Questions</h2>
            </div>
        </div>


        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
            <div class="col-md-8">
                <div class="accordion unit-8" id="accordion">
                    @isset($questions)
                    @if($questions->count() > 0)
                    @foreach($questions as $question)
                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">{{$question->question}}<span class="icon"></span></a>
                        </h3>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>{{$question->answer}}</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->
                    @endforeach
                    @endif
                    @endisset
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
