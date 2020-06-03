<form class="register-form" method="POST" action="<?php echo e(route('register')); ?>"
      onsubmit="button.disabled = true;button.classList.add('is-loading')">
    <?php echo csrf_field(); ?>
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
                            class="input has-background-white-bis noboxshadow <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            type="name" name="name"
                            id="profilepicname"
                            value="<?php echo e(old('name')); ?>"
                            required autofocus>
                    </p>

                    <?php if($errors->has('name')): ?>
                        <p class="help is-danger">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
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
                            class="input has-background-white-bis noboxshadow <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            type="email" name="email"
                            value="<?php echo e(old('email')); ?>" required autofocus>
                    </p>

                    <?php if($errors->has('email')): ?>
                        <p class="help is-danger">
                            <?php echo e($errors->first('email')); ?>

                        </p>
                    <?php endif; ?>
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
                            class="input has-background-white-bis noboxshadow <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            type="password" name="password" required>
                    </p>

                    <?php if($errors->has('password')): ?>
                        <p class="help is-danger">
                            <?php echo e($errors->first('password')); ?>

                        </p>
                    <?php endif; ?>
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
                            class="input has-background-white-bis noboxshadow <?php $__errorArgs = ['password-confirm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
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
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/forms/register.blade.php ENDPATH**/ ?>