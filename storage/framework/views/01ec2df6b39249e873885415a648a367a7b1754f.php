<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>



    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet"
          data-turbolinks-track="reload">
    <?php echo \Livewire\Livewire::styles(); ?>


    <!-- Scripts -->
    <script src="<?php echo e(mix('js/app.js')); ?>" defer data-turbolinks-track="reload"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>


    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/head.blade.php ENDPATH**/ ?>