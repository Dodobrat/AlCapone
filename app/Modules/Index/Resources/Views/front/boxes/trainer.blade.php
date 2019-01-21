<div class="trainer">
    <a href="{{ route('trainers.view', ['slug' => $data->slug]) }}" title="@strip_trans('trainers::front.meta_title')" class="link-wrapper">
        @if($data->media->isNotEmpty())
            <img src="{{ $data->media->first()->getPublicCachePath('N') }}" alt="{{ $data->names }}" class="img-fluid">
        @else
            <img src="{{asset('assets/images/no_img/N_no_img.png')}}" alt="{{ $data->names }}" class="img-fluid">
        @endif
        <div class="about-trainer">
            <div class="name">
                {{ $data->names }}
            </div>
            @if(!empty($position))
                <div class="position">
                    {{ $position }}
                </div>
            @endif
            <span class="button effect-2 effect-color-1">
                @lang('trainers::front.see_trainer')
            </span>
        </div>
        <span class="more-btn">
            <span class="plus-icon"></span>
        </span>
        @if($data->master_trainer)
            <span class="special-tag">
                @lang('index::front.master_trainer_tag')
            </span>
        @endif
    </a>
</div>