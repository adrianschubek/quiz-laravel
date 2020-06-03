<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="has-navbar-fixed-top">
<?php echo $__env->make("layouts.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make("layouts.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make("layouts.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/app.blade.php ENDPATH**/ ?>