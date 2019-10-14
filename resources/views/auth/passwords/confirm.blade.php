@extends('layouts.app')

@section('title', 'Passwort bestätigen')

@section('content')
    <section class="hero is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="subtitle">
                    <i class="fas fa-user-check"></i> Passwort bestätigen
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <div class="accent has-background-dark rounded-top"></div>

                <div class="card-content shadow">
                    <form class="login-form" method="POST" action="{{ route('password.confirm') }}">
                        @csrf
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
                                    <div class="field-body">
                                        <div class="field is-grouped">
                                            <div class="control ">
                                                <a href="{{ route('password.request') }}"
                                                   class="button is-text has-text-grey">
                                                    Passwort vergessen
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="field">
                                    <div class="field-body">
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button type="submit" class="button is-dark"><i
                                                        class="fas fa-user-check m-r-sm"></i>Bestätigen
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
