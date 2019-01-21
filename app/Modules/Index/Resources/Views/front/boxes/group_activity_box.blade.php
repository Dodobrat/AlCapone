<article class="card-primary">
    @if(!empty($data->header_media) && $data->header_media->isNotEmpty())
        <img src="{{ $data->header_media->first()->getPublicCachePath('B') }}" alt="{{ $data->meta_title }}" class="img-fluid w-100">
    @else
        <img src="{{ asset('assets/images/no_img/B_no_img.png')}}" alt="{{ $data->meta_title }}"  class="img-fluid w-100">
    @endif
    <div class="content right">
        <div class="title">
            {{ $data->title }}
        </div>
        <a href="{{ route('activities.view', ['slug' => $data->slug]) }}" title="@strip_trans('activities::front.see_more_more')" class="underline-link">
            @lang('activities::front.see_more_more')
        </a>
        <a href="https://timetable.pulsefit.bg/?club={{ $data->id }}" title="@strip_trans('activities::front.see_schedule_meta')" class="btn btn-primary primary-color">
            @lang('activities::front.see_schedule_link_index')
        </a>
    </div>
</article>