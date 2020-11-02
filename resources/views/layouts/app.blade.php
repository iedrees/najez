@extends('layouts.base')

@section('body')

    <x-navbar />

    <div class="">
        @isset($slot)
            {{ $slot}}
        @endif
        @yield('content')
    </div>

@endsection
