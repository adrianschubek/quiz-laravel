@extends('layouts.app')

@section('title', "Verifizieren")

@section('content')
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-5">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">{{ __('Bestätigen Sie Ihre E-Mail-Adresse') }}</p>
                    </header>

                    <div class="card-content">
                        @if (session('resent'))
                            <div class="notification is-success">
                                <button class="delete"></button>
                                {{ __('Ein neuer Bestätigungslink wurde an deine E-Mail-Adresse gesendet.') }}
                            </div>
                        @endif

                        {{ __('Bestätige den Verifizierungslink in deiner E-Mail.') }}
                        {{ __('Falls du die E-Mail nicht erhalten hast:') }},
                        <form action="{{ route('verification.resend') }}" method="post">
                            @csrf
                            <button type="submit" class="button is-link is-outlined"> {{ __('Klicke hier für eine neue E-Mail.') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
