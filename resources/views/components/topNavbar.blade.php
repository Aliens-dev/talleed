<nav class="top-navbar">
    <div class="container">
        <div class="switch-button hidden">
            <img src="/assets/img/3bars.svg" width="35" height="35" alt="" />
        </div>
        <div class="nav-items">
            @auth
                <div class="nav-item main-item">
                    <div class="dropdown">
                        <div class="dropdown-trigger">
                            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                                <span class="my-account">
                                    <div>
                                        <img src="/assets/img/user_account_profile.svg" alt="{{ auth()->user()->username }}" />
                                    </div>
                                    <span class="username">
                                        {{ auth()->user()->username }}
                                    </span>
                                </span>
                                <span class="icon is-medium">
                                    <img
                                        src="/assets/img/add_plus.svg"
                                        alt="user"
                                        width="16" height="16"
                                    />
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
                                <div class="dropdown-item">
                                    <form method="POST"  action="{{ route('logout') }}" >
                                        @csrf
                                        <button class="button">خروج</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="nav-item main-item">
                    <a href="{{ route('register') }}" class="nav-link">
                        <img class="animate__animated animate__bounce" src="/assets/img/editpen.svg" width="25" height="25" alt="edit" />
                        <p class="mr-2">
                            كن مدونا
                        </p>
                    </a>
                </div>
            @endguest
            <div class="nav-item nav-xl-hidden">
                <a href="{{ route('index') }}" class="nav-link">
                    الرئيسية
                </a>
            </div>
            <?php
                $categories = \App\Models\Category::take(6)->get();
            ?>
            @foreach($categories as $category)
                <div class="nav-item">
                    <a href="{{ route('category.posts.index', $category->slug) }}" class="nav-link">
                        {{ $category->name }}
                    </a>
                </div>
            @endforeach
            <div class="nav-item nav-more dropdown">
                <div class="nav-link dropdown-trigger">
                    <div>
                        المزيد
                    </div>
                    <img src="/assets/img/more.svg" width="25" height="25" alt="edit" />
                </div>
                @php $categories = \App\Models\Category::offset(6)->limit(4)->get() @endphp
                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                    <div class="dropdown-content">
                        @foreach($categories as $category)
                            <a href="{{ route('category.posts.index', $category->id) }}" class="dropdown-item">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
