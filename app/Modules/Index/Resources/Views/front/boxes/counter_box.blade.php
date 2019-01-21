<div class="counter-box @if(!empty($type) && $type=="dark") style-1 @else style-2 @endif h-100">
    <div class="text-before">
        <span>над</span>
    </div>
    <div class="number">
        <span>@if(!empty($number)){{$number}}@endif</span>
    </div>
    <div class="text-after">
        <span> @if(!empty($bottomText)){{$bottomText}} @endif</span>
    </div>
</div>