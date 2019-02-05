<ul class="shopping-items">
    <li class="shopping-item">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                <img class="asking-food-img" src="{{ asset('img/img_6.jpg') }}" alt="">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-9">
                <a href="#" class="asking-food-desc">
                    Lorem ipsum dolor sit amet, consectetur dumi koito ne zanam
                </a>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                <p class="asking-food-price">
                    {{ trans('front.price') }}
                    <span>20.00 лв.</span>
                </p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-3">
                <p class="asking-food-qty">1 бр.</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                <button class="asking-food-remove">&#10005;</button>
            </div>
        </div>
    </li>
</ul>

<div class="shopping-bottom-section">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-7 col-md-7 col-sm-7 col-6">
            <span class="total-txt">Общо: </span>
            <span class="total-price">123.53 lv.</span>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-6">
            <a href="{{ route('basket.index') }}" class="go-to-checkout">
                <button>{{ trans('front.basket') }} &#10132;</button>
            </a>
        </div>
    </div>
</div>