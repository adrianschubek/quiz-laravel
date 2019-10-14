@extends('layouts.app')

@section('title', "Suchen")

@push('head')
    @livewireAssets
@endpush

@section('content')
    @livewire('search', $query)
@endsection
