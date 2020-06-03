<?php if($paginator->hasPages()): ?>
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <a class="pagination-previous" disabled>Zurück</a>
        <?php else: ?>
            <a class="pagination-previous" href="<?php echo e($paginator->previousPageUrl()); ?>">Zurück</a>
        <?php endif; ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a class="pagination-next" href="<?php echo e($paginator->nextPageUrl()); ?>">Weiter</a>
        <?php else: ?>
            <a class="pagination-next" disabled>Weiter</a>
        <?php endif; ?>


        
        <ul class="pagination-list">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li><a class="pagination-link is-current" aria-label="Goto page <?php echo e($page); ?>"><?php echo e($page); ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e($url); ?>" class="pagination-link" aria-label="Goto page <?php echo e($page); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </nav>
<?php endif; ?>
<?php /**PATH D:\laragon\www\quiz\resources\views/vendor/pagination/bootstrap-4.blade.php ENDPATH**/ ?>