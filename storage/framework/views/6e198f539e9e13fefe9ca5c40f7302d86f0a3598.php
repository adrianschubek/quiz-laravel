<?php $__env->startSection('title', "$quiz->title"); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.quiz.hero', ['active' => 'quiz'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container m-t-md">

        <?php if(session('ok')): ?>
            <article class="message is-success">
                <div class="message-body">
                    <i class="fas fa-check"></i> <?php echo e(session('ok')); ?>

                </div>
            </article>
        <?php elseif(session('error')): ?>
            <article class="message is-danger">
                <div class="message-body">
                    <?php echo e(session('error')); ?>

                </div>
            </article>
        <?php endif; ?>
        <div class="columns is-centered is-desktop">
            <div class="column is-half">
                <?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('question', ['quiz' => $quiz])->dom;
} elseif ($_instance->childHasBeenRendered('jzbs7WA')) {
    $componentId = $_instance->getRenderedChildComponentId('jzbs7WA');
    $componentTag = $_instance->getRenderedChildComponentTagName('jzbs7WA');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jzbs7WA');
} else {
    $response = \Livewire\Livewire::mount('question', ['quiz' => $quiz]);
    $dom = $response->dom;
    $_instance->logRenderedChild('jzbs7WA', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
            </div>
            <div class="column is-one-quarter">
                <div class="box shadow1 m-b-none rbl-0 rbr-0" style="background: hsl(0, 0%, 96%);">
                    <form action="<?php echo e(route('quiz.like', $quiz)); ?>" method="post"
                          onsubmit="button.disabled = true;button.classList.add('is-loading')">
                        <?php echo csrf_field(); ?>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('like', $quiz)): ?>
                                <button name="button" class="button is-danger grow">
                                    <i class="fas fa-heart m-r-sm"></i>Mag ich
                                </button>
                            <?php else: ?>
                                <button name="button" class="button is-disabled is-light is-danger skew-forward"
                                        disabled>
                                    <i class="fas fa-check m-r-sm"></i>Mag ich
                                </button>
                            <?php endif; ?>
                        <?php elseif(auth()->guard()->guest()): ?>
                            <p>Melde dich an um zu bewerten</p>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="box rtl-0 rtr-0 noboxshadow">
                    <small class="has-text-weight-light">Beschreibung</small><br>
                    <?php echo e($quiz->description); ?>

                </div>
            </div>
        </div>
        <div class="box shadow1 m-b-sm">
            <nav class="level">
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Erstellt am</p>
                        <p><?php echo e($quiz->getCreatedAtDate()); ?></p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Aktualisiert am</p>
                        <p><?php echo e($quiz->getUpdatedAtDate()); ?></p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Gefällt</p>
                        <p class="is-family-code"><?php echo e($quiz->getLikesCount()); ?></p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Gespielt</p>
                        <p class="is-family-code"><?php echo e($quiz->getPlayCount()); ?></p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\quiz\resources\views/quiz/show.blade.php ENDPATH**/ ?>
