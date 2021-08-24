<div class="admin-nav">
    <div class="navbar-brand">
        <span class="side-toggle">
            <img src="/assets/img/3bars.svg" alt="menu" />
        </span>
        <span class="nav-toggle"><img src="/assets/img/3bars.svg" alt="menu" /></span>
    </div>
    <div class="navbar-items">
        <div class="navbar-block">
            <div class="navbar-item">
                <a class="navbar-link ripple" href="{{ route('index') }}">الرئيسية</a>
            </div>
        </div>
        <div class="navbar-block">
            <livewire:notification-component />
            <div class="navbar-item dropdown">
                <div class="dropdown-trigger">
                    <button class="button" aria-haspopup="true" aria-controls="admin-settings">
                        <span>{{ auth()->user()->fname }}</span>
                        <span class="icon is-medium">
                            <img src="/uploads/man.svg" alt="user" />
                        </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="admin-settings" role="menu">
                    <div class="dropdown-content">
                        <a href="{{ route('admin.account.index') }}" class="dropdown-item">
                            حسابي
                        </a>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item">
                            <form method="POST"  action="{{ route('logout') }}" >
                                @csrf
                                <button class="button">خروج</button>
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
