@props(['text' => 'Create', 'icon' => ''])

<a class=" btn  btn-outline-primary btn-sm" style="float:right; " {{ $attributes }}> 
    @if($icon)
        <i class="{{ $icon }}"></i>
    @else
        {{ $text }}
    @endif
</a>
