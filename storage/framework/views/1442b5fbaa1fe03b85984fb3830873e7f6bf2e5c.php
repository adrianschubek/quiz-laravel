<form class="login-form" method="POST" action="<?php echo e(route('login')); ?>"
      onsubmit="button.disabled = true;button.classList.add('is-loading')">
    <?php echo csrf_field(); ?>

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
                            id="email"
                            type="text" name="email"
                            value="<?php echo e(old('email')); ?>" required autofocus>
                    </p>

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="help is-danger">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            class="input has-background-white-bis noboxshadow <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="password" type="password" name="password" required>
                    </p>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="help is-danger">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            <button type="submit" class="button is-dark"
                                    name="button">Anmelden
                            </button>
                        </div>
                        <div class="control ">
                            <a href="<?php echo e(route('password.request')); ?>"
                               class="button is-text">
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
                    <?php echo e(old('remember') ? 'checked' : ''); ?>>
                <label for="remember">Angemeldet bleiben</label>
            </div>
        </div>
    </div>
</form>
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/forms/login.blade.php ENDPATH**/ ?>