<div class="zone-box spa-box @if(!empty($zoneBoxRight)) right @endif">
    <div class="inner">
        <div class="img-wrapper">
            @if(!empty($data->header_image) && $data->header_image->isNotEmpty())
                <img src="{{ $data->header_image->first()->getPublicCachePath('F') }}" alt="{{ $data->title }}" class="img-fluid">
            @else
                <img src="{{asset('assets/images/no_img/F_no_img.png')}}" alt="{{ $data->title }}" class="img-fluid">
            @endif
        </div>
        <div class="info">
            @if(!empty($data->title))
                <h5 class="title">
                    {{$data->title}}
                </h5>
            @endif
            @if(!empty($data->description))
                <div class="description">
                    {!! strip_tags(str_limit($data->description, 200)) !!}
                </div>
            @endif
            <a href="{{ route('spa.view',['slug'=>$data->slug] ) }}" class="vbtn btn-type11" title="@strip_trans('zones::front.preview')">@lang('zones::front.preview')</a>
        </div>
    </div>
</div>