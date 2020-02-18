@extends('layouts.app')

@section('title', 'Bearbeiten')

@section('content')
    <section class="hero is-link is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <a href="{{ route('profiles.show', $profile) }}" class="has-text-white">
                        <i class="far fa-user-circle m-r-sm "></i>{{ $profile->name }}
                        @if($profile->isAdmin())
                            <span class="tag is-danger">Administrator</span>
                        @endif
                    </a>
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-2">
        </div>
        <div class="column is-8">
            @if(session('ok'))
                <article class="message is-success">
                    <div class="message-body">
                        {{ session('ok') }}
                    </div>
                </article>
            @elseif(session('error'))
                <article class="message is-danger">
                    <div class="message-body">
                        {{ session('error') }}
                    </div>
                </article>
            @endif
            @if($errors->any())
                <article class="message is-danger">
                    <div class="message-body">
                        @foreach($errors->all() as $message)
                            {{ $message }} <br>
                        @endforeach
                    </div>
                </article>
            @endif
            <div x-data="{ open: '{{ session('page') ?? 'name' }}' }">
                <div class="columns">
                    <div class="column is-one-quarter-desktop">
                        <aside class="menu">
                            {{--                            <p class="menu-label">--}}
                            {{--                                Profil--}}
                            {{--                            </p>--}}
                            {{--                            <ul class="menu-list">--}}
                            {{--                                <li><a @click="open = 'status'"--}}
                            {{--                                       x-bind:class="{ 'is-active': open === 'status' }">Übersicht</a></li>--}}
                            {{--                                <li><a @click="open = 'stats'"--}}
                            {{--                                       x-bind:class="{ 'is-active': open === 'stats' }">Statistiken</a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            <p class="menu-label">
                                Account
                            </p>
                            <ul class="menu-list">
                                <li><a @click="open = 'name'"
                                       x-bind:class="{ 'is-active': open === 'name' }">Benutzername
                                        ändern</a></li>
                                <li><a @click="open = 'email'"
                                       x-bind:class="{ 'is-active': open === 'email' }">Email
                                        ändern</a></li>
                                <li><a @click="open = 'pw'"
                                       x-bind:class="{ 'is-active': open === 'pw' }">Passwort
                                        ändern</a></li>
                                <li><a class="has-text-grey-light" @click="open = 'acc'"
                                       x-bind:class="{ 'is-active': open === 'acc' }">Account löschen</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="column">
                        <div class="box" x-show="open === 'status'">
                            ...
                        </div>
                        <div class="box" x-show="open === 'stats'">
                            ...
                        </div>
                        <div class="box" x-show.transition.in="open === 'name'">
                            <form action="{{ route('profiles.update', $profile) }}" method="post"
                                  onsubmit="button.disabled = true;button.classList.add('is-loading')">
                                @csrf
                                @method('PUT')
                                <div class="field">
                                    <label class="label">Benutzername ändern</label>
                                    <div class="control has-icons-left">
                                        <input name="name" class="input @error('name') is-danger @enderror"
                                               type="search"
                                               placeholder="{{ $profile->name }}"
                                               onkeydown="return event.key !== 'Enter';"
                                               value="{{ old('name') }}"
                                               autocomplete="off"
                                        >
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    @error('name')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr class="is-divider m-b-sm m-t-sm">
                                <div class="field">
                                    <label class="label">Passwort bestätigen</label>
                                    <div class="control has-icons-left">
                                        <input name="current_password"
                                               class="input @error('current_password') is-danger @enderror"
                                               type="password"
                                               placeholder="Aktuelles Passwort eingeben"
                                               onkeydown="return event.key !== 'Enter';"
                                        >
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user-lock"></i>
                                        </span>
                                    </div>
                                    @error('current_password')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="button is-info is-fullwidth m-b-md" name="button">
                                    <i class="fas fa-user-edit m-r-sm"></i>Speichern
                                </button>
                            </form>
                        </div>
                        <div class="box" x-show.transition.in="open === 'email'">
                            <form action="{{ route('profiles.update', $profile) }}" method="post"
                                  onsubmit="button.disabled = true;button.classList.add('is-loading')">
                                @csrf
                                @method('PUT')
                                <div class="field">
                                    <label class="label">E-Mail ändern</label>
                                    <div class="control has-icons-left">
                                        <input name="email" class="input @error('email') is-danger @enderror"
                                               type="email"
                                               placeholder="{{ $profile->email }}"
                                               onkeydown="return event.key !== 'Enter';"
                                               value="{{ old('email') }}"
                                        >
                                        <span class="icon is-small is-left">
                                                                <i class="fas fa-envelope"></i>
                                                            </span>
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input name="email_confirmation"
                                               class="input @error('email') is-danger @enderror"
                                               type="email"
                                               placeholder="{{ $profile->email }} (wiederholen)"
                                               onkeydown="return event.key !== 'Enter';"
                                        >
                                        <span class="icon is-small is-left">
                                                                <i class="fas fa-envelope"></i>
                                                            </span>
                                    </div>
                                    <p class="help">Du erhälst eine neue Bestätigungsemail.</p>
                                </div>
                                <hr class="is-divider m-b-sm m-t-sm">
                                <div class="field">
                                    <label class="label">Passwort bestätigen</label>
                                    <div class="control has-icons-left">
                                        <input name="current_password"
                                               class="input @error('current_password') is-danger @enderror"
                                               type="password"
                                               placeholder="Aktuelles Passwort eingeben"
                                               onkeydown="return event.key !== 'Enter';"
                                        >
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user-lock"></i>
                                        </span>
                                    </div>
                                    @error('current_password')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="button is-info is-fullwidth m-b-md" name="button">
                                    <i class="fas fa-user-edit m-r-sm"></i>Speichern
                                </button>
                            </form>
                        </div>
                        <div class="box" x-show.transition.in="open === 'pw'">
                            <form action="{{ route('profiles.update', $profile) }}" method="post"
                                  onsubmit="button.disabled = true;button.classList.add('is-loading')">
                                @csrf
                                @method('PUT')
                                <div class="field">
                                    <label class="label">Passwort ändern</label>
                                    <div class="control has-icons-left">
                                        <input name="password" class="input @error('password') is-danger @enderror"
                                               type="password"
                                               placeholder="Neues Passwort"
                                               onkeydown="return event.key !== 'Enter';"
                                               autocomplete="new-password"
                                        >
                                        <span class="icon is-small is-left">
                                                                <i class="fas fa-lock"></i>
                                                            </span>
                                    </div>
                                    @error('password')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input name="password_confirmation"
                                               class="input @error('password') is-danger @enderror"
                                               type="password"
                                               placeholder="Neues Passwort wiederholen"
                                               onkeydown="return event.key !== 'Enter';"
                                               autocomplete="new-password"
                                        >
                                        <span class="icon is-small is-left">
                                                                <i class="fas fa-lock"></i>
                                                            </span>
                                    </div>
                                </div>
                                <hr class="is-divider m-b-sm m-t-sm">
                                <div class="field">
                                    <label class="label">Passwort bestätigen</label>
                                    <div class="control has-icons-left">
                                        <input name="current_password"
                                               class="input @error('current_password') is-danger @enderror"
                                               type="password"
                                               placeholder="Aktuelles Passwort eingeben"
                                               onkeydown="return event.key !== 'Enter';"
                                        >
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user-lock"></i>
                                        </span>
                                    </div>
                                    @error('current_password')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="button is-info is-fullwidth m-b-md" name="button">
                                    <i class="fas fa-user-edit m-r-sm"></i>Speichern
                                </button>
                            </form>
                        </div>
                        <div class="box" x-show.transition.in="open === 'acc'">
                            ...
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="column is-2">
        </div>
    </div>
@endsection
