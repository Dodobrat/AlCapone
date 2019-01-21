<div class="social-links d-flex justify-content-center flex-wrap">
    @if(!empty(Settings::getLocale('facebook_link')))
        <a class="button" href="{{ Settings::getLocale('facebook_link') }}" title="@strip_trans('index::front.facebook_link_title')" target="_blank"><i class="fab fa-facebook-square"></i></a>
    @endif
    @if(!empty(Settings::getLocale('instagram_link')))
        <a class="button" href="{{ Settings::getLocale('instagram_link') }}" title="@strip_trans('index::front.instagram_link_title')" target="_blank"><i class="fab fa-instagram"></i></a>
    @endif
    @if(!empty(Settings::getLocale('youtube_link')))
        <a class="button" href="{{ Settings::getLocale('youtube_link') }}" title="@strip_trans('index::front.youtube_link_title')" target="_blank"><i class="fab fa-youtube"></i></a>
    @endif
    @if(!empty(Settings::getLocale('vbox7_link')))
        <a class="button" href="{{ Settings::getLocale('vbox7_link') }}" title="@strip_trans('index::front.vbox7_link_title')" target="_blank">
            vbox7
        </a>
    @endif
</div>