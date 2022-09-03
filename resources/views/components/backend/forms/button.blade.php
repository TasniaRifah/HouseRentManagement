
@props([
    'type'=>'submit',
    'text',
    'icon',
    'color'
    ])
<button type="{{$type}}" {{ $attributes->merge(['class'=>'btn btn-sm btn-'.$color])}} >
@if($icon)
<i class='{{$icon}}'></i>
@else
{{$text}}
@endif

</button>
