<div class="post post--excerpt double-block double-block--type-1">
    <a class="double-block__overlay-link link" href="{{ route('blog.view', ['slug' => $post->slug]) }}"></a>
    <div class="double-block__posterior-block">
        @if ($post->header_media->isNotEmpty())
            <img class="w-100" src="{{ $post->header_media->first()->getPublicCachePath('R') }}">
        @else
            <img class="w-100" src="{{asset('assets/images/no_img/R_no_img.png')}}">
        @endif
    </div>
    <div class="double-block__anterior-block block block--type-1">
        <div class="block__header">
            @if (!empty($post->title))
                <h1 class="post__heading heading">{{ $post->title }}</h1>
            @endif
        </div>
        <div class="block__main">
            @if (!empty($post->sub_title))
                <p class="post__sub_title">{{ $post->sub_title }}</p>
           @elseif (!empty($post->description))
                <p class="post__description">{{ str_limit(strip_tags($post->description), 250) }}</p>
            @endif
        </div>


        <div class="post__details block__footer">
            @if (!empty($post->category))
                <a class="post__category link link--type-1" href="{{ route('blog.index', ['slug' => $post->category->slug]) }}"># {{ $post->category->title }}</a>
            @endif
            @if (!empty($post->date))
                <span class="post__date">{{ Carbon\Carbon::parse($post->date)->format('j/n/Y') }}</span>
            @endif
        </div>
    </div>
</div>