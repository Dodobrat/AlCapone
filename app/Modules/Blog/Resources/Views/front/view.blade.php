@extends('layouts.app')
@section('content')


        <div class="cover_1 cover_sm">
            <div class="img_bg" style="background-image: url('{{ asset('img/slider-1.jpg') }}');">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-11 text-center" data-aos="fade-up">
                            <h4 class="heading mb-4">{{ $blog->title }}</h4>

                            <div class="post-info">
                                <div class="date-info">{{ $blog->created_at->format('M-d-Y') }}</div>
                                <div class="author-info"><span class="seperator">|</span>By <a>Charles Clark</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </div>


    @endsection