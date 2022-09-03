@props(['text' => 'List', 'icon' => ''])

<a class=" btn  btn-outline-info btn-sm" style="float:right; " {{ $attributes }}> 
    @if($icon)
        <i class="{{ $icon }}"></i>
    @else
        {{ $text }}
    @endif
</a>

