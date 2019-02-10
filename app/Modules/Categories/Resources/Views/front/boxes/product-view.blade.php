
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
                            </li><li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                            </li>
                            <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2,
                                        </span>
                            </li><li class="menu-item-modal-allergies-item">
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

                        <select class="custom-select menu-item-modal-options" id="mySelect" onchange="getSelectedOption()">
                            <option value="" disabled selected>-- Опции --</option>
                            <option value="small" data-price="1">Малка</option>
                            <option value="medium" data-price="2">Средна</option>
                            <option value="big" data-price="3">Голяма</option>
                            <option value="party" data-price="4">Парти</option>
                        </select>

                        <script>
                            function getSelectedOption() {
                                let selected = document.querySelector(".menu-item-modal-options");
                                let price = $('option:selected').data('price');
                                console.log(selected.value, price);
                            }
                        </script>


                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 menu-item-modal-qty-container mb-3">
                        <input class="menu-item-modal-qty" type="number" min="0" max="10" placeholder="Kol.">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 menu-item-modal-price-container mb-3">
                        <p class="menu-item-modal-price">
                            @if(!empty($product->price))
                                {{ currency($product->price) }}
                            @endif
                        </p>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12 col-12 menu-item-modal-order-container mb-3">
                        <a href="#" class="menu-item-modal-order">
                            <button>{{ trans('categories::front.add') }} <i class="fa fa-cart-plus"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

