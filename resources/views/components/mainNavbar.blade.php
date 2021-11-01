<nav class="main-navbar">
    <div class="container">
        <a href="{{ route('index') }}" class="nav-brand">
            <span class="animate__animated animate__rubberBand logo">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="taleed logo" />
            </span>
            <span class="nav-name">
                تليـــد
            </span>
        </a>
        <div class="nav-items">
            <?php
                $mainMenu = \App\Models\Menu::where('name','main-menu')->first();
            ?>
            @if(! is_null($mainMenu))
                @foreach($mainMenu->items()->orderBy("order","ASC")->get() as $item)
                    <div class="nav-item">

                        <a href="{{ $item->url }}" class="nav-link">
                            {{ $item->title }}
                        </a>
                    </div>
                @endforeach
            @endif
                <?php
                /*
            <div class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    مقالات
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    تغطيات متنوعة
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    بحث علمي
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    مدونات
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    فلسفة العلوم
                </a>
            </div>
                */
                ?>
        </div>
        <div class="nav-search">
            <div class="search-form">
                <label>
                    <img src="{{ asset('assets/img/search.svg') }}" alt="search" />
                </label>
                <input type="text" name="search" value="{{ old('search') }}" placeholder="ابحث في الموقع" />
            </div>
        </div>
    </div>
</nav>
