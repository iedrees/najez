@props([
    'value' => '',
    'id' => '',
])

<input type="hidden" {{ $attributes }} id="{{$id}}" wire:init="$set('{{$id}}', '{{$value}}')"  >
