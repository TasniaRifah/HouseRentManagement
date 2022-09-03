@props(['name'])

<div class="mb-3">

<x-backend.forms.label for="{{$name}}Input" text="{{ ucfirst($name) }}"/>     

<input name="{{ $name }}" id="{{ $name.'Input' }}"
{{ $attributes->merge([
    'class' => "form-control" 
    ]) }}
>

<x-backend.forms.errors name="{{$name}}"/>

</div>


