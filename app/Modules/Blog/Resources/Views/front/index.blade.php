{{--$news--}}

@extends('layouts.app')
@section('content')

<div class="site-wrap">

    <div class="main-wrap">
        <div class="cover_1 cover_sm">
            <div class="img_bg" style="background-image: url('{{ asset('img/slider-1.jpg') }}');">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <h2 class="heading">Blog Grid</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo saepe dolorum dolorem, iste officia voluptates! Sint repudiandae, soluta voluptatem delectus iure, eaque, harum expedita, nisi aliquam magni odio perferendis ipsum!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .cover_1 -->

        <div class="section">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="media d-block media-bg-white mb-5" data-aos="fade-up"  data-aos-delay="400">
                            <figure>
                                <a href="blog-single.html"><img src="img/news_2.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="media-body">
                                <h3><a href="blog-single.html">Food that are best for your overall health</a></h3>
                                <p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
                            </div>
                        </div> <!-- .media -->
                    </div>
                    <div class="col-md-4">

                        <div class="media d-block media-bg-white mb-5" data-aos="fade-up"  data-aos-delay="400">
                            <figure>
                                <a href="blog-single.html"><img src="img/news_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="media-body">
                                <h3><a href="blog-single.html">Food that are best for your overall health</a></h3>
                                <p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
                            </div>
                        </div> <!-- .media -->

                    </div>
                    <div class="col-md-4">
                        <div class="media d-block media-bg-white mb-5" data-aos="fade-up"  data-aos-delay="400">
                            <figure>
                                <a href="blog-single.html"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="media-body">
                                <h3><a href="blog-single.html">Food that are best for your overall health</a></h3>
                                <p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
                            </div>
                        </div> <!-- .media -->
                    </div>

                    <div class="col-md-4">
                        <div class="media d-block media-bg-white mb-5" data-aos="fade-up"  data-aos-delay="400">
                            <figure>
                                <a href="blog-single.html"><img src="img/img_3.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="media-body">
                                <h3><a href="blog-single.html">Food that are best for your overall health</a></h3>
                                <p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
                            </div>
                        </div> <!-- .media -->
                    </div>
                    <div class="col-md-4">

                        <div class="media d-block media-bg-white mb-5" data-aos="fade-up"  data-aos-delay="400">
                            <figure>
                                <a href="blog-single.html"><img src="img/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="media-body">
                                <h3><a href="blog-single.html">Food that are best for your overall health</a></h3>
                                <p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
                            </div>
                        </div> <!-- .media -->

                    </div>
                    <div class="col-md-4">
                        <div class="media d-block media-bg-white mb-5" data-aos="fade-up"  data-aos-delay="400">
                            <figure>
                                <a href="blog-single.html"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="media-body">
                                <h3><a href="blog-single.html">Food that are best for your overall health</a></h3>
                                <p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>
                                <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
                            </div>
                        </div> <!-- .media -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination custom-pagination">
                            <li class="page-item prev"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>


                    </div>
                </div>
            </div>
        </div> <!-- .section -->



    </div> <!-- .main-wrap -->

</div>


    @endsection