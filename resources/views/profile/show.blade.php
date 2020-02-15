@extends('layouts.app')

@section('title', "$profile->name's Profil")

@section('content')
    <section class="hero is-link is-bold" style="background: #3f51b5">
        <div class="hero-body">
            <div class="container">
                <h1 class="has-text-weight-light title">
                    <i class="far fa-user-circle m-r-sm "></i>{{ $profile->name }}
                    @if($profile->isAdmin())
                        <span class="tag is-danger">Administrator</span>
                    @endif
                </h1>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319" preserveAspectRatio="none"
         style="display: inherit; overflow: hidden"
         height="100px" width="100%">
        <path fill="#3f51b5" fill-opacity="1"
              d="M0,224L10,224C20,224,40,224,60,218.7C80,213,100,203,120,192C140,181,160,171,180,154.7C200,139,220,117,240,106.7C260,96,280,96,300,101.3C320,107,340,117,360,128C380,139,400,149,420,149.3C440,149,460,139,480,149.3C500,160,520,192,540,181.3C560,171,580,117,600,117.3C620,117,640,171,660,202.7C680,235,700,245,720,218.7C740,192,760,128,780,106.7C800,85,820,107,840,117.3C860,128,880,128,900,144C920,160,940,192,960,197.3C980,203,1000,181,1020,186.7C1040,192,1060,224,1080,240C1100,256,1120,256,1140,261.3C1160,267,1180,277,1200,282.7C1220,288,1240,288,1260,266.7C1280,245,1300,203,1320,170.7C1340,139,1360,117,1380,122.7C1400,128,1420,160,1430,176L1440,192L1440,0L1430,0C1420,0,1400,0,1380,0C1360,0,1340,0,1320,0C1300,0,1280,0,1260,0C1240,0,1220,0,1200,0C1180,0,1160,0,1140,0C1120,0,1100,0,1080,0C1060,0,1040,0,1020,0C1000,0,980,0,960,0C940,0,920,0,900,0C880,0,860,0,840,0C820,0,800,0,780,0C760,0,740,0,720,0C700,0,680,0,660,0C640,0,620,0,600,0C580,0,560,0,540,0C520,0,500,0,480,0C460,0,440,0,420,0C400,0,380,0,360,0C340,0,320,0,300,0C280,0,260,0,240,0C220,0,200,0,180,0C160,0,140,0,120,0C100,0,80,0,60,0C40,0,20,0,10,0L0,0Z"></path>
    </svg>
    <div class="columns" style="margin-top: -120px !important;">
        <div class="column is-3">
        </div>
        <div class="column is-6">
            <div class="columns is-gapless is-vcentered">
                <div class="column is-narrow">
                    <div class="box has-background-white">
                        <div class="columns">
                            <div class="column is-narrow">
                                <canvas width="50" height="50" data-jdenticon-value="{{ $profile->name }}"></canvas>
                            </div>
                            <div class="column">
                                <div class="columns">
                                    <div class="column">
                                        @if($profile->last_login_at)
                                            <p>
                                                <span class="has-text-weight-light">Zuletzt angemeldet </span>
                                                <i class="fas fa-signal has-text-grey"></i>
                                                {{ $profile->last_login_at->fromNow() }}
                                            </p>
                                        @endif
                                        <p>
                                            <span class="has-text-weight-light">Mitglied seit </span>
                                            <i class="fas fa-birthday-cake has-text-grey"></i>
                                            {{ $profile->created_at->format('d.m.Y') }}
                                        </p>
                                    </div>
                                    <div class="column is-narrow">
                                        @can('update', $profile)
                                            <a href="{{ route('profiles.edit', $profile) }}"
                                               class="button is-warning"><i
                                                    class="fas fa-pen"></i></a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="box rtl-0 rbl-0 noboxshadow" style="background: hsl(0, 0%, 96%);">
                        <nav class="level">
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Likes</p>
                                    <p class="is-family-code">{{ $likes }}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Aufrufe</p>
                                    <p class="is-family-code">{{ $playcount }}</p>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="box has-background-white-bis noboxshadow">
                <div class="columns">
                    <div class="column">
                        <h1 class="subtitle"><i class="fas fa-layer-group"></i> Quizze ({{ $quizzes->total() }})</h1>
                    </div>
                    <div class="column is-narrow">
                        @can('update', $profile)
                            <a href="{{ route('quiz.index') }}" class="button is-warning"><i
                                    class="fas fa-pen"></i></a>
                        @endcan
                    </div>
                </div>
                @forelse($quizzes as $quiz)
                    @include('layouts.quiz.quiz', $quiz)
                @empty
                    <article class="message">
                        <div class="message-body">
                            Keine Quizze veröffentlicht.
                        </div>
                    </article>
                @endforelse
                {{ $quizzes->links() }}
            </div>
        </div>
        <div class="column is-3">
        </div>
    </div>
@endsection


