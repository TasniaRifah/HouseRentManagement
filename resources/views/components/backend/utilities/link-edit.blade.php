@props(['text' => 'Edit', 'icon' => ''])
<a class="btn btn-sm btn-warning" {{ $attributes }}>
    @if($icon)
        <i class="{{ $icon }}"></i>
    @else
        {{ $text }}
    @endif
</a>

