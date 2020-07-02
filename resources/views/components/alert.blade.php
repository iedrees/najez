<div {{ $attributes->merge(['class' => 'container mx-auto']) }}>
    <div class="p-4 bg-{{ $color ?? 'blue' }}-50 border-2 border-{{ $color ?? 'blue' }}-200 rounded-md my-3 text-{{ $color?? 'blue' }}-500 font-bold text-sm mx-3 sm:mx-0">
        <i class="{{ $icon ?? 'ti-alert' }} ml-2"></i>
        {{ $slot }}
    </div>
</div>
