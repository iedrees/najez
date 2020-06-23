@extends('layouts.base')

@section('body')

    <x-navbar />

    <div class="container mx-auto">
        @yield('content')
    </div>
    
@endsection
