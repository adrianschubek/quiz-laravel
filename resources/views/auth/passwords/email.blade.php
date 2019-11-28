@extends('layouts.app')

@section('title', 'Passwort zurücksetzen')

@section('content')


    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="subtitle">
                    <i class="fas fa-key"></i> Passwort zurücksetzen
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <div class="accent has-background-dark rounded-top"></div>

                <div class="card-content shadow">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="forgot-password-form" method="POST" action="{{ route('password.email') }}" onsubmit="button.disabled = true;button.classList.add('is-loading')">

                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">E-Mail</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="email" type="email" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-dark" name="button">Passwort zurücksetzen
                                        </button>
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
