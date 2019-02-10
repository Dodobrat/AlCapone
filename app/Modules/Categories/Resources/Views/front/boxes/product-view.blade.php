<div class="menu-modal-content">
    <div class="row justify-content-center mx-0">
        <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-img-container px-0">
            <div class="menu-item-modal-img"
                 @if(!empty($product) && $product->media->isNotEmpty())
                 style="background-image: url('{{ $product->media->first()->getPublicPath() }}')"
                 @else
                 style="background-image: url('{{ asset('img/slider-1.jpg') }}')"
                    @endif>
            </div>
            <button class="menu-modal-close d-block d-md-none" onclick="closeModal()">
                &#10005;
            </button>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12 col-12 menu-item-modal-info-container">
            <div class="row">
                <div class="col-12 menu-item-modal-title-container">
                    <h2 class="menu-item-modal-title">
                        @if(!empty($product->title))
                            {{ $product->title }}
                        @endif
                    </h2>
                    <button class="menu-modal-close d-none d-md-block" onclick="closeModal()">
                        &#10005;
                    </button>
                </div>
                <div class="col-12 menu-item-modal-desc-container">
                    <div class="menu-item-modal-desc">
                        @if(!empty($product->description))
                            {!! $product->description !!}
                        @endif
                    </div>
                </div>
                <div class="col-12 menu-item-modal-allergies-container">
                    <h5 class="menu-item-modal-allergies-title">Alergeni: </h5>
                    <ul class="menu-item-modal-allergies-list">
                        <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                        </li>
                        <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2,
                                        </span>
                        </li>
                        <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                        </li>
                        <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2,
                                        </span>
                        </li>
                        <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                        </li>
                        <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2
                                        </span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-options-container mb-3">

                    <select class="custom-select menu-item-modal-options"
                            id="mySelect"
                            onchange="getSelectedOption()">
                        @if(!empty($product) && $product->options->isEmpty())
                        <option value="{{ null }}"
                                data-price="@if(!empty($product)) {{ $product->getPrice() }} @endif">Няма
                        </option>
                        @endif
                        @if(!empty($product) && $product->options->isNotEmpty())
                            @foreach($product->options as $option)
                                <option value="{{ $option->id }}"
                                        data-price="{{ $option->pivot->price }}">{{ $option->title }}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 menu-item-modal-qty-container mb-3">
                    <input class="menu-item-modal-qty"
                           type="number"
                           min="1"
                           max="10"
                           value="1"
                           onchange="getSelectedOption()"
                           onmouseup="getSelectedOption()"
                           onkeyup="getSelectedOption()"
                           oninput="getSelectedOption()">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-6 menu-item-modal-price-container mb-3">
                    <p class="menu-item-modal-price">
                        @if(!empty($product))
                            {{ currency($product->getPrice()) }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12 col-12 menu-item-modal-order-container mb-3">
                    <a
                            class="menu-item-modal-order"
                            data-product_id="@if(!empty($product)) {{ $product->id }} @endif"
                            data-product_route="{{ route('basket.add') }}"
                            onclick="addToCart()"
                    >
                        <button>{{ trans('categories::front.add') }} <i class="fa fa-cart-plus"></i></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

