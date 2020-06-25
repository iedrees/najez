<a href="{{route('home')}}" class="flex items-center">
    <img src="{{asset('images/008-tasks.svg')}}" alt="{{ config('app.name') }}" {{ $attributes->merge(['class' => 'mx-auto']) }}>
    <h1 class="mx-3 font-bold text-gray-800 text-3xl  font-neckar -mb-2">{{ config('app.name') }}</h1>
</a>
