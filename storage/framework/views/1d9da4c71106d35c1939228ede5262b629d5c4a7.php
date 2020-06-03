<section class="hero is-link is-bold is-small">
    <div class="hero-body">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <div class="container">
                        <h1 class="title m-b-none">
                            <?php echo e($quiz->title); ?>

                        </h1>
                        <span class="subtitle has-text-weight-light">von</span>
                        <a class="tag is-link is-light"
                           href="<?php echo e(route('profiles.show', $quiz->user)); ?>">
                            <?php echo e($quiz->user->name); ?></a>
                        <?php if($quiz->user->isAdmin()): ?>
                            <span class="tag is-danger">Administrator</span>
                        <?php endif; ?>
                        <span class="has-text-weight-light">
                        - <?php echo e($quiz->relative_created); ?> erstellt
                        </span>
                    </div>
                </div>
                <div class="level-right">
                    <div class="container">
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><i class="fas fa-play"></i></span>
                                    <span class="tag is-white"><?php echo e($quiz->getPlayCount()); ?></span>
                                </div>
                            </div>

                            <div class="control">
                                <a class="tags has-addons are-medium shrink"
                                   href="<?php echo e(route('quiz.likedby', [$quiz, $quiz->getSlug()])); ?>">
                                    <span class="tag is-white"><i class="fas fa-heart has-text-danger"></i></span>
                                    <span class="tag is-danger"><?php echo e($quiz->getLikesCount()); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li <?php if($active === 'quiz'): ?> class="is-active" <?php endif; ?>>
                        <a href="<?php echo e(route('quiz.show', [$quiz->id, $quiz->getSlug()])); ?>"
                           <?php if($active === 'quiz'): ?> class="is-active-grey" <?php endif; ?>>
                            <i class="fas fa-play m-r-sm"></i> Quiz
                        </a>
                    </li>
                    <li <?php if($active === 'comments'): ?> class="is-active" <?php endif; ?>>
                        <a href="<?php echo e(route('comments.show',[$quiz, $quiz->getSlug()])); ?>"
                           <?php if($active === 'comments'): ?> class="is-active-grey" <?php endif; ?>>
                            <i class="fas fa-comments m-r-sm"></i>
                            Kommentare
                            <?php if($quiz->comments->count() !== 0): ?><span
                                class="tag is-white m-l-sm"><?php echo e($quiz->comments->count()); ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('profiles.show', $quiz->user)); ?>"><i class="fas fa-user m-r-sm"></i> Mehr
                            von <?php echo e($quiz->user->name); ?></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/quiz/hero.blade.php ENDPATH**/ ?>