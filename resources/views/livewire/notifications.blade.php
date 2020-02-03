<div wire:init="getNotifications" wire:poll.20s="getNotifications" x-data="{ open: false }"
     class="navbar-item has-dropdown"
     x-bind:class="{ 'is-active': open }"
     style="align-items: center!important;">
    <a class="navbar-link is-arrowless" @click="open = !open" @click.away="open = false">
        @if(count($notifications) !== 0)
            <i class="fas fa-bell has-text-danger"></i>
            <span class="tag is-grey m-l-sm">{{ count($notifications) }}</span>
        @else
            <i class="far fa-bell has-text-grey-light"></i>
        @endif
    </a>
    <div class="navbar-dropdown is-right">
        @forelse($notifications as $notification)
            <a class="navbar-item has-background-warning" wire:click="readNotification('{{ $notification->id }}')"
               disabled>
                <p>{{ $notification->data["desc"] }}</p>
                [<small>{{ $notification->created_at->fromNow() }}</small>]
            </a>
        @empty
            <div class="navbar-item has-text-grey-light">
                <i class="fas fa-ghost m-r-sm"></i>Nichts vorhanden
            </div>
        @endforelse
        @if(count($notifications) !== 0)
            <hr class="navbar-divider">
            <a class="navbar-item" disabled wire:click="markAllAsRead">
                <i class="fas fa-check m-r-sm"></i> Alles als gelesen markieren
            </a>
        @endif
        {{--        <hr class="navbar-divider">--}}
        {{--        <a class="navbar-item">--}}
        {{--            <i class="far fa-bell m-r-sm"></i> Alle Benachrichtigungen anzeigen--}}
        {{--        </a>--}}
    </div>
</div>
