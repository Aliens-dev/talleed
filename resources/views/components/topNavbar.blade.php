<nav class="top-navbar">
    <div class="container">
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
                            كن مدوناً
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
                $categories = \App\Models\Category::take(8)->get();
                $topMenu = \App\Models\Menu::where('name', 'top-menu')->first();
            ?>
            @if(! is_null($topMenu))
                @foreach($topMenu->items()->take(8)->orderBy("order","ASC")->get() as $item)
                    <div class="nav-item">
                        <a href="{{ $item->url }}" class="nav-link">
                            {{ $item->title }}
                        </a>
                    </div>
                @endforeach
            @endif
            <?php
                /*
                @foreach($categories as $category)
                    <div class="nav-item">
                        <a href="{{ route('category.posts.index', $category->slug) }}" class="nav-link">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
                */
            ?>
            <?php
                /*
                    @foreach($topMenu->items()->take(6)->get() as $item)
                        <div class="nav-item">
                            <a href="{{ $item->url }}" class="nav-link">
                                {{ $item->title }}
                            </a>
                        </div>
                    @endforeach
                 */
            ?>
            <div class="is-flex is-flex-grow-1"></div>
            <div class="nav-item nav-more dropdown">
                <div class="nav-link dropdown-trigger">
                    <div>
                        المزيد
                    </div>
                    <img src="/assets/img/more.svg" width="25" height="25" alt="edit" />
                </div>
                @if(! is_null($topMenu))
                    @php $items = $topMenu->items()->offset(8)->limit(4)->get() @endphp
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            @foreach($items as $item)
                                <a href="{{ $item->url }}" class="dropdown-item">
                                    {{ $item->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>


<nav class="m-navbar">
    <div class="overlay"></div>
    <div class="m-nav">
        <div class="three-bars">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="logo">
            <img src="/assets/img/logo.svg" width="40" height="40" />
        </div>
    </div>
    <div class="m-menu">
        <div class="cross-bars">
            <div></div>
            <div></div>
        </div>
        <div class="divider-h"></div>
        @auth
            <div class="m-item main-item">
                <div class="m-link">
                    <span class="username" data-toggle="collapse">
                        {{ auth()->user()->username }}
                    </span>
                    <div class="collapse-container">
                        <div class="collapse">
                            <a href="{{ route('users.profile', ['user' => auth()->id()]) }}" class="collapse-item">
                                حسابي
                            </a>
                            <a href="{{ route('posts.create') }}" class="collapse-item">
                                اضافة تدوينة
                            </a>
                            <a href="{{ route('users.edit', auth()->id()) }}" class="collapse-item">
                                تعديل الحساب
                            </a>
                            <div class="collapse-item">
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
            <div class="m-item main-item">
                <a href="{{ route('register') }}" class="m-link">
                    كن مدوناً
                </a>
            </div>
        @endguest
        <div class="divider-h"></div>
        <div class="m-item">
            <a href="{{ route('index') }}" class="m-link">
                الرئيسية
            </a>
        </div>
        <div class="divider-h"></div>
        <?php
            $categories = \App\Models\Category::take(5)->get();
        ?>
        @foreach($categories as $category)
            <div class="m-item">
                <a href="{{ route('category.posts.index', $category->slug) }}" class="m-link">
                    {{ $category->name }}
                </a>
            </div>
            <div class="divider-h"></div>
        @endforeach
        <form class="search-form mb-1 mt-1" action="{{ route('search') }}" method="GET">
            <label>
                <img src="{{ asset('assets/img/search.svg') }}" alt="search" />
            </label>
            <input type="text" name="search" value="{{ old('search') }}" placeholder="ابحث في الموقع" />
        </form>
    </div>
</nav>
