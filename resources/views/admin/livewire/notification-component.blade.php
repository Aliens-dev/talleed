    <div class="navbar-item dropdown">
        <div class="dropdown-trigger">
            <button class="button notification-btn" aria-haspopup="true" aria-controls="admin-settings">
                <img class="notification-bell" src="/assets/img/bell.svg" alt="bell" width="22" height="22" />
                @if($unread)
                    <div class="notification-count"></div>
                @endif
            </button>
        </div>
        @if(count($notifications))
            <div class="dropdown-menu" id="admin-settings" role="menu">
            <div class="dropdown-content">
                <div class="title is-6 mb-0 is-bold p-3 has-background-info-dark has-text-white is-flex is-justify-content-space-between">
                    <div>الاشعارات</div>
                </div>
                <div class="admin-dropdown-notification">
                    @foreach($notifications as $notification)
                        <a wire:click.prevent="markAsRead('{{ $notification->id }}')"
                           href="{{ $notification->data['route'] }}"
                           class="
                               @if($notification->read_at)
                                       has-background-white
                                @endif
                               message is-info pr-2 mb-1 dropdown-item"
                        >
                            <div class="message-body pr-0 pt-0 pb-0 pr-3">
                                {{ $notification->data['message'] }}
                                <div class="subtitle is-flex is-justify-content-space-between is-7 mr-4 mt-2">
                                    {{ \Carbon\Carbon::parse($notification->data['time'])->locale('ar')->diffForHumans() }}
                                    @if($notification->read_at)
                                        <p>&#10004;</p>
                                    @else
                                        <p>&#10005;</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
