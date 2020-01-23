@extends('layouts.app')

@section('title', "Suchen")

@push('head')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

@section('content')
    @livewire('search', $query)
@endsection
