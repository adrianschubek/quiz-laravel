<div wire:init="getNotifications" wire:poll.20s="getNotifications" x-data="{ open: false }"
     class="navbar-item has-dropdown"
     :class="{ 'is-active': open }"
     style="align-items: center!important;">
    <a class="navbar-link is-arrowless" @click="open = !open" @click.away="open = false">
        <?php if(count($notifications) !== 0): ?>
            <i class="fas fa-bell has-text-danger"></i>
            <span class="tag is-grey m-l-sm"><?php echo e(count($notifications)); ?></span>
        <?php else: ?>
            <i class="far fa-bell has-text-grey-light"></i>
        <?php endif; ?>
    </a>
    <div class="navbar-dropdown is-right">
        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($loop->iteration === 10): ?>
                <?php break; ?>
            <?php endif; ?>
            <a class="navbar-item has-background-warning" wire:click="readNotification('<?php echo e($notification->id); ?>')"
               disabled>
                <p><?php echo e($notification->data["desc"]); ?></p>
                [<small><?php echo e($notification->created_at->fromNow()); ?></small>]
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="navbar-item has-text-grey-light">
                <i class="fas fa-ghost m-r-sm"></i>Nichts vorhanden
            </div>
        <?php endif; ?>
        <?php if(count($notifications) !== 0): ?>
                <hr class="navbar-divider">
                <a class="navbar-item" wire:click="markAllAsRead">
                    <i class="fas fa-check m-r-sm"></i> Alles als gelesen markieren
                </a>
            <?php endif; ?>
        <hr class="navbar-divider">
        <a class="navbar-item" href="<?php echo e(route('notifications')); ?>">
            <i class="far fa-bell m-r-sm"></i> Alle Benachrichtigungen anzeigen
        </a>
    </div>
</div>
<?php /**PATH D:\laragon\www\quiz\resources\views/livewire/notifications.blade.php ENDPATH**/ ?>