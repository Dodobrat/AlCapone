<div class="post-categories-menu">
    <h3 class="post-categories-menu__heading heading d-none d-lg-block">@lang('blog::front.category_menu_heading')</h3>
    <button type="button" class="post-categories-menu__toggler button collapsed d-lg-none" data-toggle="collapse" data-target=".post-categories-menu__list"><i class="fas fa-bars"></i> @lang('blog::front.category_menu_heading')</button>
    <div class="post-categories-menu__list collapse d-lg-block">
        <a class="post-categories-menu__item link link--type-1 {{ empty($current_category) ? 'active' : '' }}" href="{{ route('blog.index') }}">@lang('blog::front.category_menu_general_category')</a>
        @foreach ($categories as $single_category)
            <a class="post-categories-menu__item link link--type-1 {{ !empty($current_category) && $single_category->slug == $current_category->slug ? 'active' : '' }}" href="{{ route('blog.index', ['slug' => $single_category->slug]) }}">{{ $single_category->title }}</a>
        @endforeach
    </div>
</div>