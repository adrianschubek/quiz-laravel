<nav class="navbar is-fixed-top"
     style="border-top-color: #3f51b5;border-top-width: thick;border-top-style: solid;" x-data="{ navopen: false }">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name') }}</a>

            <div class="navbar-burger burger" data-target="navMenu" @touchstart="navopen = !navopen">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu" :class="{ 'is-active': navopen }">
            <div class="navbar-start"></div>

            <div class="navbar-end">
                {{-- Suche--}}
                <div class="flex centerflex" x-data="{query: ''}">
                    {{--                    <form action="{{ route('quiz.search') }}" class="m-r-sm field has-addons"--}}
                    {{--                          onsubmit="button.disabled = true;button.classList.add('is-loading')"--}}
                    {{--                          x-data="{ query: '', type: '' }" x-ref="sform">--}}
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
                        {{--                        <input type="hidden" name="type" :value="type">--}}
                    </div>
                    <template x-if="query">
                        <div class="dropdown-menu" style="left: initial; display: block; padding-top: 0px">
                            <div class="dropdown-content">
                                <form action="{{ route('quiz.search') }}" x-ref="title">
                                    <input type="hidden" name="query" :value="query">
                                    <input type="hidden" name="type" value="title">
                                    <a @click="$refs.title.submit()" class="dropdown-item">
                                        Suche '<span x-text="query"></span>' in Titel
                                    </a>
                                </form>
                                <form action="{{ route('quiz.search') }}" x-ref="description">
                                    <input type="hidden" name="query" :value="query">
                                    <input type="hidden" name="type" value="description">
                                    <a @click="$refs.description.submit()" class="dropdown-item">
                                        Suche '<span x-text="query"></span>' in Beschreibung
                                    </a>
                                </form>
                                <form action="{{ route('quiz.search') }}" x-ref="user">
                                    <input type="hidden" name="query" :value="query">
                                    <input type="hidden" name="type" value="user">
                                    <a @click="$refs.user.submit()" class="dropdown-item">
                                        Suche Quizze von '<span x-text="query"></span>'
                                    </a>
                                </form>
                            </div>
                        </div>
                    </template>
                    {{--                        <div class="control">--}}
                    {{--                            <button type="submit" class="button is-link " name="button">--}}
                    {{--                                <i class="fas fa-search"></i>--}}
                    {{--                            </button>--}}
                    {{--                        </div>--}}
                    {{--                    </form>--}}
                </div>
                @guest
                    @if(!request()->route()->named(["login", "register"]))
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
                                                    <a @click="window.location='{{ route("register") }}'">Registrieren</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @include('layouts.forms.login')
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
                                        @include('layouts.forms.register')
                                    </div>
                                </div>
                                <button class="modal-close is-large" aria-label="close" @click="open = false"></button>
                            </div>
                        </div>
                    @endif
            </div>
            @else
                <livewire:notifications/>
                <div class="navbar-item has-dropdown is-hoverable" id="nav-user-dropdown" data-turbolinks-permanent>
                    <a class="navbar-link"
                       href="{{ route('profiles.show', [auth()->user()->id, auth()->user()->name]) }}">
                        <canvas width="40" height="40"
                                data-jdenticon-value="{{ auth()->user()->name }}"></canvas>
                        {{ auth()->user()->name }}
                    </a>
                    <div class="navbar-dropdown">
                        @auth
                            <a class="navbar-item" href="{{ route('quiz.index') }}">
                                <i class="fas fa-layer-group m-r-sm"></i> Meine Quizze
                            </a>
                        @endauth
                        <a class="navbar-item" href="{{ route('comments.index') }}">
                            <i class="fas fa-comments m-r-sm"></i> Meine Kommentare
                        </a>
                        <a class="navbar-item" href="{{ route('likes.index') }}">
                            <i class="fas fa-heart m-r-sm"></i> Lieblingsquizze
                        </a>
                        <a class="navbar-item" href="{{ route('profiles.edit', auth()->user()->id) }}">
                            <i class="fas fa-cogs m-r-sm"></i> Einstellungen
                        </a>
                        <hr class="dropdown-divider">
                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt m-r-sm"></i> Abmelden
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>
