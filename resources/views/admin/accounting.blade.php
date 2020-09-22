@extends('layouts.component')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __("Accounting") }}</h2>
@endsection
@section('content')
    <div class="justify-center mx-auto p-4 max-w-4xl rounded mb-4">
        @livewire('accounting')
    </div>
@endsection
