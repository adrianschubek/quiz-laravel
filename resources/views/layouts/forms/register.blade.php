<form class="register-form" method="POST" action="{{ route('register') }}"
      onsubmit="button.disabled = true;button.classList.add('is-loading')">
    @csrf
    <div class="columns">
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Profilbild</label>
                </div>
            </div>
        </div>
        <div class="column">
            <canvas id="pic" width="50" height="50" data-jdenticon-value></canvas>
        </div>
    </div>
    <div class="columns">
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Benutzername</label>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input
                            class="input has-background-white-bis noboxshadow @error('name') is-danger @enderror"
                            type="name" name="name"
                            id="profilepicname"
                            value="{{ old('name') }}"
                            required autofocus>
                    </p>

                    @if ($errors->has('name'))
                        <p class="help is-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

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
                            type="email" name="email"
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
    </div>

    <div class="columns">
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Passwort</label>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input
                            class="input has-background-white-bis noboxshadow @error('password') is-danger @enderror"
                            type="password" name="password" required>
                    </p>

                    @if ($errors->has('password'))
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-3">
            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label">Passwort bestätigen</label>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input
                            class="input has-background-white-bis noboxshadow @error('password-confirm') is-danger @enderror"
                            type="password"
                            name="password_confirmation" required>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column">
        </div>
        <div class="column is-4">
            <div class="field is-horizontal ">
                <div class="field-label"></div>

                <div class="field-body ">
                    <div class="field is-grouped ">
                        <div class="control ">
                            <button type="submit"
                                    class="button is-dark is-fullwidth"
                                    name="button">
                                Registrieren
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
