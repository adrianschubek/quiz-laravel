@extends('layouts.app')

@push('head')
    @livewireAssets
@endpush

@section('content')
    @livewire('search', $query)
@endsection
