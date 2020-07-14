@props([
    'label' => '',
    'for',
    'error' => false,
    'helpText' => false,
    'sideInfo',
])

<div class="  ">
  <div class="md:col-span-2">
    <div class="sm:items-start sm:pb-5 bg-white px-5 py-4 rounded mb-1 border border-transparent @if($error) border-red-400 @endif">
        @if ($label)
            <label for="{{ $for }}" class="block text-sm font-bold leading-5 text-gray-600 sm:mt-px">
              {{ $label }}
            </label>
        @endif

        <div class="mt-3">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-xs text-gray-400">{{ $helpText }}</p>
            @endif
        </div>
    </div>
  </div>

  @isset($sideInfo)
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
          {{$sideInfo}}
      </div>
    </div>
  @endisset
</div>
