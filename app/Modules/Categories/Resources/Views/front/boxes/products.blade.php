<div class="tab-pane menu-list-items-container fade active show" id="menu_category_{{ $category->slug }}" role="tabpanel">

    <div class="row">

        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-2 my-2">

                <div class="card menu-list-item">
                    <img src="{{ asset('img/slider-1.jpg') }}" class="card-img-top menu-list-item-card-img" alt="" data-modal="modal brat">
                    <div class="card-body menu-list-item-card-body">
                        <h5 class="card-title menu-list-item-card-title">
                            {{ $product->title }}
                        </h5>
                        <div class="menu-list-item-card-desc-container">
                            <p class="card-text menu-list-item-card-desc">
                                {!! $product->description !!}
                            </p>
                        </div>
                        <hr>
                        <div class="menu-list-item-card-add-btn-container">
                            <a
                               class="btn menu-list-item-card-add-btn"
                               data-modal="modal buton">
                                {{ trans('products::front.check') }}
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>