<?php $__env->startSection('title', "Mitglieder"); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero is-link is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="fas fa-users m-r-sm "></i> Mitglieder
                </h1>
            </div>
        </div>
    </section>
    <div class="columns m-t-md m-b-md">
        <div class="column is-3"></div>
        <div class="column is-6">
            <?php if(empty($users)): ?>
                <article class="message">
                    <div class="message-body">
                        ... noch keinem.
                    </div>
                </article>
            <?php else: ?>
                <div class="columns">
                    <div class="column">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->odd): ?>
                                <?php echo $__env->make('layouts.user.user', $user, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="column">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->even): ?>
                                <?php echo $__env->make('layouts.user.user', $user, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php echo e($users->links()); ?>

            <?php endif; ?>
        </div>
        <div class="column is-3"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\quiz\resources\views/profile/index.blade.php ENDPATH**/ ?>