@extends('layouts.component')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __("Brands") }}</h2>
@endsection
@section('content')
    <div class="justify-center mx-auto p-4 max-w-4xl mb-4">
        @livewire('brands')
    </div>
@endsection
