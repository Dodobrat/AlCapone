<div class="shopping-cart-container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <h4 class="shopping-cart-title">
                @if (!empty($basket) && $basket->products->isNotEmpty())
                    {{ trans('front.order') }}:
                @else
                    {{ trans('front.empty-basket') }}
                @endif
            </h4>
            <button id="basket-m">&#10230;</button>
        </div>
    </div>
    @if (!empty($basket) && $basket->products->isNotEmpty())


        <ul class="shopping-items">
            @foreach($basket->products as $basketProduct)
                <li class="shopping-item">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                            @if($basketProduct->product->media->isNotEmpty())
                                <img class="asking-food-img" src="{{ $basketProduct->product->media->first()->getPublicPath() }}" alt="">
                            @else
                                <img class="asking-food-img" src="{{ asset('img/img_6.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-9">
                            <a class="asking-food-desc">
                                @if(!empty($basketProduct->product_option))
                                ({{ $basketProduct->product_option->option->title }})
                                @endif
                                {{ $basketProduct->product->title }}
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                            <p class="asking-food-price">
                                {{ trans('front.price') }}
                                <span>{{ currency($basketProduct->getPrice()) }}</span>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-3">
                            <p class="asking-food-qty">{{ $basketProduct->getQuantity() }} бр.</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                            <button class="asking-food-remove">&#10005;</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="shopping-bottom-section">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 col-md-7 col-sm-7 col-6">
                    <span class="total-txt">Общо: </span>
                    <span class="total-price">{{ currency($basket->getTotalPrice()) }}</span>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-6">
                    <a href="{{ route('basket.index') }}" class="go-to-checkout">
                        <button>{{ trans('front.basket') }} &#10132;</button>
                    </a>
                </div>
            </div>
        </div>
    @else
        {{--nqma produkti--}}
    @endif
</div>

