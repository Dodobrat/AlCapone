<div class="tab-pane menu-list-items-container fade active show" id="menu_category_{{ $category->slug }}" role="tabpanel">

    <div class="row">

        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-2 my-2" data-aos="zoom-in">

                <div class="card menu-list-item">

                    <img @if(!empty($product) && $product->media->isNotEmpty())
                            src="{{ $product->media->first()->getPublicPath() }}"
                         @else
                            src="{{ asset('img/slider-1.jpg') }}"
                         @endif
                         class="card-img-top menu-list-item-card-img"
                         alt="{{ $product->slug }}"
                         data-modal="{{ $product->id }}"
                         data-murl="{{ route('products.getProduct') }}"
                         onclick="openModal( '{{ $product->id }}','{{ route('products.getProduct') }}')">

                    <div class="card-body menu-list-item-card-body">
                        <h5 class="card-title menu-list-item-card-title">
                            {{ $product->title }}
                        </h5>
                        <div class="menu-list-item-card-desc-container">
                            <p class="card-text menu-list-item-card-desc">
                                @if(strlen($product->description) > 50)
                                    {!! mb_substr(strip_tags($product->description),0,50,"utf-8")."..." !!}
                                @else
                                    {!! mb_substr(strip_tags($product->description),0,50,"utf-8") !!}
                                @endif
                            </p>
                        </div>
                        <hr>
                        <div class="menu-list-item-card-add-btn-container">
                            <a
                               class="btn menu-list-item-card-add-btn"
                               data-modal="{{ $product->id }}"
                               data-murl="{{ route('products.getProduct') }}"
                               onclick="openModal( '{{ $product->id }}','{{ route('products.getProduct') }}')">
                                {{ trans('products::front.check') }}
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>

@section('js')

@endsection