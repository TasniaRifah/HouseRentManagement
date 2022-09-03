@props(['text' => 'Trash List', 'icon' => ''])

<a class="position-static btn btn-outline-light btn-sm" style="left: 115px; color: #2eab49; border-color:red; padding-left:20px; padding-right:20px; margin:0px 5px 0px 15px; " {{ $attributes }}> 
    @if($icon)
        <i class="{{ $icon }}"></i>
    @else
        {{ $text }}
    @endif
</a>
