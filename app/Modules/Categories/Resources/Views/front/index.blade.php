@extends('layouts.app')
@section('content')


<div class="site-wrap">

    <div class="main-wrap">
        <div class="cover_1 cover_sm">
            <div class="img_bg" style="background-image: url('{{ asset('img/slider-1.jpg') }}');" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7" data-aos="fade-up">
                            <h2 class="heading">Restaurant's Menu</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo saepe dolorum dolorem, iste officia voluptates! Sint repudiandae, soluta voluptatem delectus iure, eaque, harum expedita, nisi aliquam magni odio perferendis ipsum!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .cover_1 -->

        <div class="menu-list-section" data-aos="fade-down">
            <h2 class="menu-list-section-title text-center">
                {{ trans('categories::front.menu-with-prices') }}
            </h2>
            <div class="container">
                <div class="row justify-content-center">
                    <ul class="nav menu-category-list" role="tablist">
                        <li class="menu-category-item">
                            <a class="menu-category-link active" id="category-" data-toggle="pill" data-slug="slug brat" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Пици</a>
                        </li>
                        <li class="menu-category-item">
                            <a class="menu-category-link" id="category-2" data-toggle="pill" data-slug="slug brat1" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Салати</a>
                        </li>
                        <li class="menu-category-item">
                            <a class="menu-category-link" id="category-3" data-toggle="pill" data-slug="slug brat2" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Барбекю</a>
                        </li>
                    </ul>

                </div>
                <div class="tab-content menu-list-items-container">
                    <div class="tab-pane fade show active menu-list-item" id="pills-home" role="tabpanel">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12 menu-list-item-img-container">
                                <img src="{{ asset('img/slider-1.jpg') }}" alt="" class="menu-list-item-img">
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-5 col-sm-9 col-9 menu-list-item-title-container">
                                <h3 class="menu-list-item-title">
                                    Шопска супа
                                    <span class="option">
(голяма)
                                    </span>

                                </h3>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3 menu-list-item-price-container">
                                <span class="menu-list-item-price">
5.60 лв.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade menu-list-item" id="pills-profile" role="tabpanel">CATEGORY 2</div>
                    <div class="tab-pane fade menu-list-item" id="pills-contact" role="tabpanel">CATEGORY 3</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8" data-aos="fade-up">

                        <h2 class="mb-5 text-center">Menu List with Price</h2>

                        <ul class="nav site-tab-nav" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-breakfast-tab" data-toggle="pill" href="#pills-breakfast" role="tab" aria-controls="pills-breakfast" aria-selected="true">Breakfast</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-lunch-tab" data-toggle="pill" href="#pills-lunch" role="tab" aria-controls="pills-lunch" aria-selected="false">Brunch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-dinner-tab" data-toggle="pill" href="#pills-dinner" role="tab" aria-controls="pills-dinner" aria-selected="false">Dinner</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab">
                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Warm Spinach Dip &amp; Chips</a></h3>
                                        <p>Spinach and artichokes in a creamy cheese dip with warm tortilla chips &amp; salsa.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$10.49</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Key Wast Machos</a></h3>
                                        <p>Crisp tortilla and plantain chips covered with lightly spiced ground beef, melted cheese, pickled jalapeños, guacamole, sour cream and salsa.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$11.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Crispy Onions Rings</a></h3>
                                        <p>A heaping mountain of rings, handmade with Panko breading and shredded coconut flakes.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$11.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Lobster &amp; Shrimp Quesadilla</a></h3>
                                        <p>Lobster and tender shrimp, with onions, sweet peppers, spinach and our three cheese blend. Griddled and served with tomato salsa and sour cream.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$13.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->


                            </div>
                            <div class="tab-pane fade" id="pills-lunch" role="tabpanel" aria-labelledby="pills-lunch-tab">

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Jumbo Lump Crab Stack</a></h3>
                                        <p>Spinach and artichokes in a creamy cheese dip with warm tortilla chips &amp; salsa.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$12.49</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Jamaican Chicken Wings</a></h3>
                                        <p>Crisp tortilla and plantain chips covered with lightly spiced ground beef, melted cheese, pickled jalapeños, guacamole, sour cream and salsa.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$15.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Bahamian Seafood Chowder</a></h3>
                                        <p>A heaping mountain of rings, handmade with Panko breading and shredded coconut flakes.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$10.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Grilled Chicken &amp; Tropical Fruit on Mixed Greens</a></h3>
                                        <p>Lobster and tender shrimp, with onions, sweet peppers, spinach and our three cheese blend. Griddled and served with tomato salsa and sour cream.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$12.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                            </div>
                            <div class="tab-pane fade" id="pills-dinner" role="tabpanel" aria-labelledby="pills-dinner-tab">

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Grilled Top Sirlion Steak</a></h3>
                                        <p>Spinach and artichokes in a creamy cheese dip with warm tortilla chips &amp; salsa.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$18.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Steak Oscar</a></h3>
                                        <p>Crisp tortilla and plantain chips covered with lightly spiced ground beef, melted cheese, pickled jalapeños, guacamole, sour cream and salsa.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$23.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Skirt Steak Churrasco</a></h3>
                                        <p>A heaping mountain of rings, handmade with Panko breading and shredded coconut flakes.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$20.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="#">Grilled Beef Steak</a></h3>
                                        <p>Lobster and tender shrimp, with onions, sweet peppers, spinach and our three cheese blend. Griddled and served with tomato salsa and sour cream.</p>
                                    </div>
                                    <div class="price order-2">
                                        <strong>$20.99</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div> <!-- .section -->


        @include('index::boxes.specials')



    </div> <!-- .main-wrap -->

</div>


@endsection