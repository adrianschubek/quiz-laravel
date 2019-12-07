@extends('layouts.app')

@section('title', "Quiz erstellen")

@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    Neues Quiz erstellen
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="container">
                <form action="{{ route('quiz.store') }}" method="post" onsubmit="button.disabled = true;button.classList.add('is-loading')">
                    @csrf
                    <div class="box">
                        <div class="field">
                            <label class="label">Titel</label>
                            <div class="control has-icons-left">
                                <input class="input @error('title') is-danger @enderror"
                                       type="text"
                                       placeholder="Gebe ein Titel ein" name="title"
                                       onkeydown="return event.key !== 'Enter';"
                                       value="{{ old('title') }}"
                                >
                                <span class="icon is-small is-left">
                                    <i class="fas fa-heading"></i>
                                </span>
                            </div>
                            @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="label">Beschreibung</label>
                            <div class="control">
                                <textarea class="textarea @error('description') is-danger @enderror" type="text"
                                          placeholder="Gebe eine Beschreibung ein"
                                          name="description">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="level">
                            <div class="level-left"></div>
                            <div class="level-right">
                                <div class="field">
                                    <div class="control">
                                        <button class="button is-info" name="button">
                                            <i class="fas fa-plus-circle m-r-sm"></i> Fragen hinzufügen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="column is-3">

        </div>
    </div>
@endsection
