@extends('layouts.app')

@section('title', "$quiz->title bearbeiten")

@push('head')
    @livewireAssets
@endpush

@section('content')
    <section class="hero is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    {{ $quiz->title }}
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="box has-background-white-ter">
                {{ $quiz->description }}
            </div>
            @livewire('question', $quiz)
        </div>
        <div class="column is-3">
        </div>
    </div>
@endsection
