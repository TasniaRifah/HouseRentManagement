
@props([
    'type'=>'submit',
    'text' =>'Create',
    'icon' => '',
    'color' => '#4b97f7'
    ])
<button type="{{$type}}" style="background-color: {{$color}};" {{ $attributes->merge(['class'=>'btn btn-sm'])}} >
@if($icon)
<i class='{{$icon}}'></i>
@else
{{$text}}
@endif

</button>
