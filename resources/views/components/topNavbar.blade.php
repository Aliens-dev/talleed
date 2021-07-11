<nav class="top-navbar">
    <div class="container">
        <div class="nav-items">
            @auth
                <div class="nav-item main-item">
                    <div class="dropdown is-active">
                        <div class="dropdown-trigger">
                            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                                <span>حسابي</span>
                                <span class="icon is-small">
                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </button>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    حسابي
                                </a>
                                <a class="dropdown-item">
                                    اضافة تدوينة
                                </a>
                                <hr class="dropdown-divider">
                                <form method="POST" class="dropdown-item" action="{{ route('logout') }}" >
                                    @csrf
                                    <button class="nav-link">
                                        خروج
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="nav-item main-item">
                    <a href="{{ route('register') }}" class="nav-link">
                        كن مدونا
                    </a>
                </div>
            @endguest
            <?php
                $categories = \App\Models\Category::take(8)->get();
            ?>
            @foreach($categories as $category)
                <div class="nav-item">
                    <a href="{{ route('category.posts.index', $category->slug) }}" class="nav-link">
                        {{ $category->name }}
                    </a>
                </div>
            @endforeach
            <div class="nav-item">
                <a href="#" class="nav-link">
                    المزيد
                </a>
            </div>
        </div>
    </div>
</nav>
