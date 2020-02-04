@extends('layouts.app')

@section('title', "Anmelden")

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="subtitle">
                    <i class="fas fa-sign-in-alt"></i> Anmelden
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card animated shake">
                <div class="accent has-background-dark rounded-top"></div>

                <div class="card-content shadow">
                    <form class="login-form" method="POST" action="{{ route('login') }}" onsubmit="button.disabled = true;button.classList.add('is-loading')">
                        @csrf

                        <div class="columns">
                            <div class="column is-3">
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">E-Mail</label>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input
                                                class="input has-background-white-bis noboxshadow @error('email') is-danger @enderror"
                                                id="email"
                                                type="text" name="email"
                                                value="{{ old('email') }}" required autofocus>
                                        </p>

                                        @error('email')
                                        <p class="help is-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-3">
                                <div class="field is-horizontal align-middle">
                                    <div class="field-label align-middle">
                                        <label class="label align-middle">Passwort</label>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input
                                                class="input has-background-white-bis noboxshadow @error('password') is-danger @enderror"
                                                id="password" type="password" name="password" required>
                                        </p>
                                        @error('password')
                                        <p class="help is-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="level">
                            <div class="level-left">
                                <div class="field">
                                    <div class="field-label"></div>
                                    <div class="field-body">
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button type="submit" class="button is-dark" name="button">Anmelden</button>
                                            </div>

                                            <div class="control ">
                                                <a href="{{ route('password.request') }}" class="button is-text">
                                                    Passwort vergessen
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="field">
                                    <input id="remember" type="checkbox" name="remember"
                                           class="switch is-dark"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Angemeldet bleiben</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
