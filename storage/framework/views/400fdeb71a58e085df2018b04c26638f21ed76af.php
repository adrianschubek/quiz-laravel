<nav class="navbar is-fixed-top"
     style="border-top-color: #3f51b5;border-top-width: thick;border-top-style: solid;" x-data="{ navopen: false }">
    <div class="container">
        <div class="navbar-brand">
            <a href="<?php echo e(url('/')); ?>" class="navbar-item"><?php echo e(config('app.name')); ?></a>

            <div class="navbar-burger burger" data-target="navMenu" @click="navopen = !navopen">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu" :class="{ 'is-active': navopen }">
            <div class="navbar-start"></div>

            <div class="navbar-end">
                
                <div class="flex centerflex" x-data="{query: ''}">
                    
                    
                    
                    <div class="control has-icons-left ">
                        <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                        </span>
                        <input class="input m-r-sm has-background-white-ter noborder noboxshadow" type="search"
                               name="query"
                               placeholder="Suche..."
                               autocomplete="off"
                               x-model="query"
                        >
                        
                    </div>
                    <template x-if="query">
                        <div class="dropdown-menu" style="left: initial; display: block; padding-top: 0px">
                            <div class="dropdown-content">
                                <form action="<?php echo e(route('quiz.search')); ?>">
                                    <input type="hidden" name="query" :value="query">
                                    <input type="hidden" name="type" value="title">
                                    <button class="dropdown-item button is-white">
                                        Suche '<span x-text="query"></span>' in Titel
                                    </button>
                                </form>
                                <form action="<?php echo e(route('quiz.search')); ?>">
                                    <input type="hidden" name="query" :value="query">
                                    <input type="hidden" name="type" value="description">
                                    <button class="dropdown-item button is-white">
                                        Suche '<span x-text="query"></span>' in Beschreibung
                                    </button>
                                </form>
                                <form action="<?php echo e(route('quiz.search')); ?>">
                                    <input type="hidden" name="query" :value="query">
                                    <input type="hidden" name="type" value="user">
                                    <button class="dropdown-item button is-white">
                                        Suche Quizze von '<span x-text="query"></span>'
                                    </button>
                                </form>
                            </div>
                        </div>
                    </template>
                    
                    
                    
                    
                    
                    
                </div>
                <?php if(auth()->guard()->guest()): ?>
                    <?php if(!request()->route()->named(["login", "register"])): ?>
                        <div class="buttons" x-data="{ open: false, page: 1 }">
                            <button class="navbar-item button is-white" @click="open = true;page = 1">Anmelden</button>
                            <div class="modal" :class="{ 'is-active': open && page === 1 }">
                                <div class="modal-background" @click="open = false"></div>
                                <div class="modal-content">
                                    <div class="box">
                                        <div class="tabs is-centered">
                                            <ul>
                                                <li class="is-active"><a>Anmelden</a></li>
                                                <li>
                                                    <a @click="window.location='<?php echo e(route("register")); ?>'">Registrieren</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php echo $__env->make('layouts.forms.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <button class="modal-close is-large" aria-label="close" @click="open = false"></button>
                            </div>
                            <div class="modal" :class="{ 'is-active': open && page === 2 }">
                                <div class="modal-background" @click="open = false"></div>
                                <div class="modal-content">
                                    <div class="box">
                                        <div class="tabs is-centered">
                                            <ul>
                                                <li><a @click="page=1">Anmelden</a></li>
                                                <li class="is-active"><a>Registrieren</a></li>
                                            </ul>
                                        </div>
                                        <?php echo $__env->make('layouts.forms.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                <button class="modal-close is-large" aria-label="close" @click="open = false"></button>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>
            <?php else: ?>
                <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('notifications', [])->dom;
} elseif ($_instance->childHasBeenRendered('eNrVrof')) {
    $componentId = $_instance->getRenderedChildComponentId('eNrVrof');
    $componentTag = $_instance->getRenderedChildComponentTagName('eNrVrof');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('eNrVrof');
} else {
    $response = \Livewire\Livewire::mount('notifications', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('eNrVrof', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
                <div class="navbar-item has-dropdown is-hoverable" id="nav-user-dropdown" data-turbolinks-permanent>
                    <a class="navbar-link"
                       href="<?php echo e(route('profiles.show', [auth()->user()->id, auth()->user()->name])); ?>">
                        <canvas width="40" height="40"
                                data-jdenticon-value="<?php echo e(auth()->user()->name); ?>"></canvas>
                        <?php echo e(auth()->user()->name); ?>

                    </a>
                    <div class="navbar-dropdown">
                        <?php if(auth()->guard()->check()): ?>
                            <a class="navbar-item" href="<?php echo e(route('quiz.index')); ?>">
                                <i class="fas fa-layer-group m-r-sm"></i> Meine Quizze
                            </a>
                        <?php endif; ?>
                        <a class="navbar-item" href="<?php echo e(route('comments.index')); ?>">
                            <i class="fas fa-comments m-r-sm"></i> Meine Kommentare
                        </a>
                        <a class="navbar-item" href="<?php echo e(route('likes.index')); ?>">
                            <i class="fas fa-heart m-r-sm"></i> Lieblingsquizze
                        </a>
                        <a class="navbar-item" href="<?php echo e(route('profiles.edit', auth()->user()->id)); ?>">
                            <i class="fas fa-cogs m-r-sm"></i> Einstellungen
                        </a>
                        <hr class="dropdown-divider">
                        <a class="navbar-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt m-r-sm"></i> Abmelden
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                              style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH D:\laragon\www\quiz\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>