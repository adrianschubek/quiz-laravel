@extends('layouts.app')

@section('content')
    <section class="hero is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="far fa-user-circle m-r-sm "></i>{{ $profile->name }}
                    @if($profile->isAdmin())
                        <span class="tag is-danger">Administrator</span>
                    @endif
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="box has-background-white">

            </div>
            <div class="box has-background-white-bis">
                <form action="{{ route('profiles.update', $profile) }}" method="post">
                    @csrf
                    @method('PUT')

                </form>
            </div>
        </div>
        <div class="column is-3">
        </div>
    </div>
@endsection
