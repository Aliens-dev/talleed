<nav class="top-navbar">
    <div class="container">
        <div class="switch-button hidden">
            <img src="/assets/img/3bars.svg" width="35px" height="35px" alt="" />
        </div>
        <div class="nav-items">
            @auth
                <div class="nav-item main-item">
                    <div class="dropdown">
                        <div class="dropdown-trigger">
                            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                                <span>{{ auth()->user()->fname }}</span>
                                <span class="icon is-medium">
                                    <img src="/uploads/man.svg" alt="user" />
                                </span>
                            </button>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="{{ route('users.profile', ['user' => auth()->id()]) }}" class="dropdown-item">
                                    حسابي
                                </a>
                                <a href="{{ route('posts.create') }}" class="dropdown-item">
                                    اضافة تدوينة
                                </a>
                                <a href="{{ route('users.edit', auth()->id()) }}" class="dropdown-item">
                                    تعديل الحساب
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
