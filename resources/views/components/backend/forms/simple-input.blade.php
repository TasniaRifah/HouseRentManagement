@props(['name'])

   

<input name="{{ $name }}" id="{{ $name.'Input' }}"
{{ $attributes->merge([
    'class' => "form-control" 
    ]) }}
>

<x-backend.forms.errors name="{{$name}}"/>



