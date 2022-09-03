@props(['type','message'])
@if($message)
    <div role="alert" {{$attributes->merge(['class'=>'alert alert-'.$type])}}>
    {{$message}}

</div>

@endif
