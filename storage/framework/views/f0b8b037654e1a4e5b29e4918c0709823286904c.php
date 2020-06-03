<div class="box m-b-md">
    <?php if($position + 1 === $max): ?>
        <div wire:loading style="width: 100%">
            <div class="notification has-background-white has-text-centered" style="align-content: center">
                <i class="fas fa-circle-notch fa-spin fa-3x m-r-sm"></i>
                <p>Deine Antworten werden überprüft...</p>
            </div>
        </div>
    <?php else: ?>
        <div class="ph-item noborder" wire:loading style="width: 100%; padding: 2em 0 0;">
            <div class="ph-col-12">
                <div class="ph-row">
                    <div class="ph-col-4"></div>
                    <div class="ph-col-8 empty"></div>

                    <div class="ph-col-12"></div>
                    <div class="ph-col-2 empty"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
                <div class="ph-row">
                    <div class="ph-col-8 big"></div>
                    <div class="ph-col-2 empty big"></div>
                    <div class="ph-col-2 big"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div wire:loading.class="is-hidden">
        <?php if($position === $max): ?>
            <p class="subtitle">Ergebnis <span class="tag is-light is-info is-medium">
                <?php echo e(($results['correct'] / $max) * 100); ?>%
                </span>
            </p>
            <p>
                Du hast
                <span class="tag is-light is-medium">
                    <span class="m-r-sm">
                        <?php echo e($results['correct']); ?>

                    </span>von
                    <span class="has-text-weight-bold m-l-sm">
                        <?php echo e($max); ?>

                    </span>
                </span>
                Fragen
                richtig beantwortet.
            </p>
            <div class="m-t-sm">
                <?php $__currentLoopData = $results["questions"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(($q->correct + 1) === ($results["user"][$loop->index] + 1)): ?>
                        
                        <div class="box noboxshadow">
                            <b><?php echo e($loop->index + 1); ?>. <?php echo e($q->title); ?></b><br>
                            <span class="tag is-success is-light">Deine Antwort <span
                                    class="fas fa-check m-l-sm"></span></span>
                            <?php echo e($q["answer_" . ($results["user"][$loop->index])]); ?>

                        </div>
                    <?php else: ?>
                        
                        <div class="box noboxshadow">
                            <b><?php echo e($loop->index + 1); ?>. <?php echo e($q->title); ?></b><br>
                            <span class="tag is-success is-light">Richtige Antwort <span
                                    class="fas fa-check m-l-sm"></span></span>
                            <?php echo e($q["answer_" . ($q->correct)]); ?>

                            <hr>
                            <span class="tag is-danger is-light">Deine Antwort <span
                                    class="fas fa-times m-l-sm"></span></span>
                            <?php echo e($q["answer_" . ($results["user"][$loop->index])]); ?>

                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="has-text-weight-light">Frage <?php echo e($position + 1); ?> von <?php echo e($max); ?></p>
            <p class="subtitle"><?php echo e($this->question['title']); ?></p>

            <div class="control">
                <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm" wire:click="addAnswer(1)">
                    <?php echo e($this->question['answer_1']); ?>

                </a>
                <?php if(isset($this->question['answer_2'])): ?>
                    <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm"
                       wire:click="addAnswer(2)">
                        <?php echo e($this->question['answer_2']); ?>

                    </a>
                    <?php if(isset($this->question['answer_3'])): ?>
                        <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm"
                           wire:click="addAnswer(3)">
                            <?php echo e($this->question['answer_3']); ?>

                        </a>
                        <?php if(isset($this->question['answer_4'])): ?>
                            <a class="box noboxshadow has-background-white-ter shrink-sm quizbtn m-b-sm"
                               wire:click="addAnswer(4)">
                                <?php echo e($this->question['answer_4']); ?>

                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            


        <?php endif; ?>
    </div>
</div>


<?php /**PATH D:\laragon\www\quiz\resources\views/livewire/question.blade.php ENDPATH**/ ?>