@props([
    'id' => 'name',
])

<div class="px-4 py-4 border-b-2 border-gray-200 @error($id) border-red-500 @enderror sm:px-0">
    <input
         {{ $attributes }}
         id="{{$id}}"
         autofocus autocomplete="off"
         class="block text-2xl leading-6 font-bold text-gray-800 focus:outline-none bg-transparent" />
</div>
@error($id) <div class="text-xs text-red-500 mt-2">{{ $message }}</div> @enderror
