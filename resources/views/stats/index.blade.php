@extends('layouts.app')

@section('title', "Statistiken")

@section('content')
    <section class="hero is-dark is-bold is-fullheight">
        <div class="hero-body">
            <div class="container">
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey-light">Quizze</p>
                            <p class="title has-text-white"><i
                                    class="fas fa-layer-group has-text-grey-light"></i> {{ App\Quiz::count()}}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey-light">Fragen</p>
                            <p class="title has-text-white">
                                <i class="fas fa-question has-text-grey-light"></i> {{ App\Question::count() }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey-light">Likes</p>
                            <p class="title has-text-white"><i
                                    class="fas fa-thumbs-up has-text-grey-light"></i> {{ App\Like::count() }}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading has-text-grey-light">Benutzer</p>
                            <p class="title has-text-white"><i
                                    class="fas fa-users has-text-grey-light"></i> {{ App\User::count() }}</p>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
@endsection
