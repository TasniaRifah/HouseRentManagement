@props(['text' => 'Export', 'icon' => ''])

<a class="position-static btn btn-secondary btn-sm" style=" margin:0 5px;" {{ $attributes }}> 
    @if($icon)
        <i class="{{ $icon }}"></i>
    @else
        {{ $text }}
    @endif
</a>
