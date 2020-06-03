<?php $__env->startSection('title', "$quiz->title Kommentare"); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.quiz.hero', ['active' => 'comments'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container m-b-lg m-t-lg">
        <div class="columns is-centered">
            <div class="column is-half">
                <?php if(session('ok')): ?>
                    <article class="message is-success">
                        <div class="message-body">
                            <?php echo e(session('ok')); ?>

                        </div>
                    </article>
                <?php elseif(session('error')): ?>
                    <article class="message is-danger">
                        <div class="message-body">
                            <?php echo e(session('error')); ?>

                        </div>
                    </article>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Comment::class)): ?>
                    <article class="media" x-data="{ show: false }">
                        <figure class="media-left">
                            <canvas width="50" height="50" data-jdenticon-value="<?php echo e(auth()->user()->name); ?>"></canvas>
                        </figure>
                        <div class="media-content">
                            <form action="<?php echo e(route('comments.store', [$quiz, $quiz->getSlug()])); ?>" method="post"
                                  onsubmit="button.disabled = true;button.classList.add('is-loading')">
                                <?php echo csrf_field(); ?>
                                <div class="field">
                                    <p class="control">
                            <textarea class="textarea <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comment"
                                      placeholder="Dein Kommentar..."
                                      style="min-height: 5em !important;"
                                      @input="show = $event.target.value.length > 0"
                            ><?php echo e(old('comment')); ?></textarea>
                                    </p>
                                </div>
                                <nav class="level" x-show="show">
                                    <div class="level-left"></div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <button name="button" class="button is-info"><i
                                                    class="fas fa-paper-plane m-r-sm"></i>
                                                Senden
                                            </button>
                                        </div>
                                    </div>
                                </nav>
                                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <article class="message is-danger">
                                    <div class="message-body">
                                        <?php echo e($message); ?>

                                    </div>
                                </article>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </form>
                        </div>
                    </article>
                <?php else: ?>
                    <article class="message">
                        <div class="message-body">
                            Melde dich an, um Kommentare zu schreiben.
                        </div>
                    </article>
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo $__env->make('layouts.comment.comment', compact('comment'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <article class="message is-info m-t-md">
                        <div class="message-body">
                            <i class="fas fa-comment-slash m-r-sm"></i> Keine Kommentare vorhanden.
                        </div>
                    </article>
                <?php endif; ?>
                <div class="m-t-sm"></div>
                <?php echo e($comments->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\quiz\resources\views/comments/show.blade.php ENDPATH**/ ?>