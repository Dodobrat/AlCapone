<div class="tab-pane menu-list-items-container fade active show" id="menu_category_{{ $category->slug }}" role="tabpanel">

    <div class="row">

        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-2 my-2">

                <div class="card menu-list-item">
                    <img src="{{ asset('img/slider-1.jpg') }}"
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
                                {!! mb_substr(strip_tags($product->description),0,50)." ..." !!}
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
    <script>
        let modal = document.querySelector('#my-modal');

        function closeModal() {
            modal.style.display = 'none';
        }

        function openModal(id, url) {
            let productId = id;
            let productUrl = url;

            $.ajaxSetup({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: productUrl,
                method: 'post',
                data: {
                    product_id: productId,
                },

                success: function(result) {
                    if (result.errors.length != 0) {
                        $('.alert-danger').html('');

                        $.each(result.errors, function (key, value) {

                        });
                    } else {
                        modal.style.display = 'flex';
                        modal.innerHTML = result.product_modal;
                    }
                }
            });
        }
    </script>
@endsection