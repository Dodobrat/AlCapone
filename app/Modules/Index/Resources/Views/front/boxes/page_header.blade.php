<div id="page-header" @if(!empty($image))style="background-image: url('{{$image}}')" @endif class="page-header @if(!empty($video)) video loading @endif ">
    <div class="pulse"></div>
    <div class="breadcrumbs-wrapper dark-bg">
        {!! Breadcrumbs::render('index') !!}
    </div>

    <div class="content">
        @if(!empty($title))
            <h1 class="title">{!! $title !!}</h1>
        @endif
    </div>
    @if(!empty($video))
        <div class="video-background">
            <div class="video-foreground" id="YouTubeBackgroundVideoPlayer" data-video-id="{{$video}}"></div>
            {{--<video id="header-video" class="video-js video-foreground" preload="auto" playsinline>--}}
                {{--<source src="{{$video}}" type="application/x-mpegURL">--}}
            {{--</video>--}}
        </div>
    @endif
</div>

{{--<video id="header-video" class="video-js" controls preload="auto" data-setup='{ "autoplay" : "muted" ,"controls" : false}'>--}}
{{--<source src="https://storage.googleapis.com/healthy-lifestylefit-videos/1_Trenirovka_Zagriavka_BG/playlist.m3u8" type="application/x-mpegURL">--}}
{{--</video>--}}

