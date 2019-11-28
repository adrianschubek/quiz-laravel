@extends('layouts.app')

@section('title', "Statistiken")

@section('content')
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey">Quizze</p>
                            <p class="title has-text-dark"><i
                                    class="fas fa-layer-group has-text-grey-light"></i> {{ $quiz }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey">Fragen</p>
                            <p class="title has-text-dark">
                                <i class="fas fa-question has-text-grey-light"></i> {{ $question }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey">Likes</p>
                            <p class="title has-text-dark"><i
                                    class="fas fa-thumbs-up has-text-grey-light"></i> {{ $like }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey">Benutzer</p>
                            <p class="title has-text-dark"><i
                                    class="fas fa-users has-text-grey-light"></i> {{ $user }}</p>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
@endsection
