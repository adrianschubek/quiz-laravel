@extends('layouts.app')

@section('title', "$quiz->title Likes")

@section('content')
    <section class="hero is-danger is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="fas fa-heart m-r-sm "></i> Gefällt ({{ $users->total() }})
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md m-b-md">
        <div class="column is-3"></div>
        <div class="column is-6">
            @if(empty($users))
                <article class="message">
                    <div class="message-body">
                        ... noch keinem.
                    </div>
                </article>
            @else
                <div class="columns">
                    <div class="column">
                        @foreach($users as $user)
                            @if($loop->odd)
                                @include('layouts.user.user', $user)
                            @endif
                        @endforeach
                    </div>
                    <div class="column">
                        @foreach($users as $user)
                            @if($loop->even)
                                @include('layouts.user.user', $user)
                            @endif
                        @endforeach
                    </div>
                </div>
                {{ $users->links() }}
            @endif
        </div>
        <div class="column is-3"></div>
    </div>
@endsection
