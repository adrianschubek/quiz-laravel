@extends('layouts.app')

@section('title', 'Passwort bestätigen')

@section('content')
    <section class="hero is-link is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <a href="{{ route('profiles.show', auth()->user()) }}" class="has-text-white">
                        <i class="far fa-user-circle m-r-sm "></i>{{ auth()->user()->name }}
                        @if(auth()->user()->isAdmin())
                            <span class="tag is-danger">Administrator</span>
                        @endif
                    </a>
                </h1>
            </div>
        </div>
    </section>
    <div class="columns is-marginless is-centered">
        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    <form class="login-form" method="POST" action="{{ route('password.confirm') }}"
                          onsubmit="button.disabled = true;button.classList.add('is-loading')">
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
                                                   class="button is-text has-text-grey" name="button">
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
                                                <button type="submit" class="button " name="button"><i
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
