<div class="zone-box @if(!empty($zoneBoxRight)) right @endif" @if(!empty($zoneBoxRight))data-aos="fade-left" @else data-aos="fade-right" @endif >
    <div class="inner">
        <div class="img-wrapper">
            @if(!empty($data->media) && $data->media->isNotEmpty())
                <img src="{{ $data->media->first()->getPublicCachePath('F') }}" alt="{{ $data->title }}" class="img-fluid">
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
            @if(!empty($data->short_description))
                <div class="description">
                    {!! strip_tags(str_limit($data->short_description, 250)) !!}
                </div>
            @endif
            {{--{{ route('zones.view', ['fitness_slug' => $data->slug, 'zone_slug' => $data->slug]); }}--}}
            <a href="{{ route('zones.view', ['fitness_slug' => $data->fitness->slug, 'zone_slug' => $data->slug] ) }}" class="vbtn btn-type11" title="@strip_trans('zones::front.preview')">@lang('zones::front.preview')</a>
        </div>
    </div>
</div>