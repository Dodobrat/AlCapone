<div class="fitness-extra-box" data-aos="zoom-in">
    @if(!empty($small))
        @if(!empty($data->header_media) && $data->header_media->isNotEmpty())
            <img src="{{ $data->header_media->first()->getPublicCachePath('G') }}" alt="{{ $data->title }}" class="img-fluid">
        @else
            <img src="{{asset('assets/images/no_img/G_no_img.png')}}" alt="{{ $data->title }}" class="img-fluid">
        @endif
    @else
        @if(!empty($data->header_media) && $data->header_media->isNotEmpty())
            <img src="{{ $data->header_media->first()->getPublicCachePath('H') }}" alt="{{ $data->title }}" class="img-fluid">
        @else
            <img src="{{asset('assets/images/no_img/H_no_img.png')}}" alt="{{ $data->title }}" class="img-fluid">
        @endif
    @endif
    <div class="content">
        <div class="inner">
            @if(!empty($data->title))
                <h5 class="title">
                    {{$data->title}}
                </h5>
            @endif
            <div class="btn-holder">
                <a href="{{ route('extras.view',['slug'=>$data->slug] ) }}" class="{{--vbtn btn-type12--}} button button--type-1 button--effect-1 mobile-arrow-effect-xs">
                    @lang('extras::front.preview')
                    <div class="arrow-effect-wrapper d-block d-sm-none">
                        <div class="landing__mouse"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
