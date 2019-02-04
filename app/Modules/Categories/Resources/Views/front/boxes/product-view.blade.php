<div id="my-modal" class="menu-modal">
    <div class="menu-modal-content">
        <div class="row justify-content-center mx-0">
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-img-container px-0">
                <img src="{{ asset('img/slider-1.jpg') }}" alt="" class="menu-item-modal-img">
                <button class="menu-modal-close d-block d-md-none">
                    &#10005;
                </button>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 menu-item-modal-info-container">
                <div class="row">
                    <div class="col-12 menu-item-modal-title-container">
                        <h2 class="menu-item-modal-title">Pizza Margarita</h2>
                        <button class="menu-modal-close d-none d-md-block">
                            &#10005;
                        </button>
                    </div>
                    <div class="col-12 menu-item-modal-desc-container">
                        <div class="menu-item-modal-desc">Уникално италианско тесто по избор, гарнирано с доматен сос, моцарела, гъби и щипка риган. МОЛЯ,ИЗБЕРЕТЕ ВАШЕТО ТЕСТО: ИТАЛИАНСКО КЛАСИЧЕСКО ТЕСТО; ПЪЛНОЗЪРНЕСТО ТЕСТО С ЛИМЕЦ; ИТАЛИАНСКО </div>
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
                        <select class="menu-item-modal-options" name="options">
                            <option selected>{{ trans('categories::front.select-option') }}</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 menu-item-modal-qty-container mb-3">
                        <input class="menu-item-modal-qty" type="number" min="0" max="10" placeholder="Kol.">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 menu-item-modal-price-container mb-3">
                        <p class="menu-item-modal-price">20.00 lv.</p>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12 col-12 menu-item-modal-order-container mb-3">
                        <a href="#" class="menu-item-modal-order">
                            <button>DOBAVI <i class="fa fa-cart-plus"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>