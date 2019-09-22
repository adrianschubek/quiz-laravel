@extends('layouts.app')

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
            <div class="box ">
                {{ $quiz->description }}
            </div>
        </div>
        <div class="column is-3">
        </div>
    </div>

    @livewireAssets
@endsection
