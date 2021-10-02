<nav class="main-navbar">
    <div class="container">
        <a href="{{ route('index') }}" class="nav-brand">
            <span class="logo">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="taleed logo" />
            </span>
            <span>
                تليـــد
            </span>
        </a>
        <div class="nav-items">
            <div class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    مقالات
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('contact') }}" class="nav-link">
                    تواصل معنا
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    اعرف عنا
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('confidentiality') }}" class="nav-link">
                    سياسة الخصوصية
                </a>
            </div>
        </div>
        <div class="nav-search">
            <form class="search-form" action="{{ route('search') }}" method="GET">
                <label>
                    <img src="{{ asset('assets/img/search.svg') }}" alt="search" />
                </label>
                <input type="text" name="search" value="{{ old('search') }}" placeholder="ابحث في الموقع" />
            </form>
        </div>
    </div>
</nav>
