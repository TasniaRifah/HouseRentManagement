<div class="mb-3">

    <x-backend.forms.label for="{{$name}}Input" text="{{ ucwords(str_replace('_', ' ', $name)) }}" />
    <select name="{{$name}}" id="{{$name}}Input" {{ $attributes->merge([
    'class' => "form-control" 
    ]) }}>
    
        <option value="">Select On</option>
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}">{{ $option['value'] }}</option>
        @endforeach
    </select>
    <x-backend.forms.errors name="{{$name}}" />

</div>
