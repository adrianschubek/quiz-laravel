<a href="<?php echo e(route('profiles.show', $user)); ?>" class="box">
    <article class="media">
        <figure class="media-left">
            <p class="image is-64x64">
                <canvas width="64" height="64" data-jdenticon-value="<?php echo e($user->name); ?>"></canvas>
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <p>
                    <span class="subtitle"><?php echo e($user->name); ?></span>
                    <small class="has-text-weight-light">#<?php echo e($user->id); ?></small>
                    <?php if($user->isAdmin()): ?>
                        <span class="tag is-danger is-light">Administrator</span>
                    <?php endif; ?>
                    <br>
                    <?php if($quiz_count > 0): ?>
                        <span class="tag is-light">
                            <i class="fas fa-layer-group m-r-sm"></i> <?php echo e($quiz_count); ?>

                        </span>
                    <?php endif; ?>
                    <?php if($likes > 0): ?>
                        <span class="tag is-light is-danger">
                            <i class="fas fa-heart m-r-sm"></i> <?php echo e($likes); ?>

                        </span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </article>
</a>
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/user/user.blade.php ENDPATH**/ ?>