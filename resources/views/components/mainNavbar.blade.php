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
                <a href="#" class="nav-link">
                    مقالات
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    تغطيات متنوعة
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    اسلوب حياة
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    مدونات
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    فلسفة العلوم
                </a>
            </div>
        </div>
        <div class="nav-search">
            <form class="search-form">
                <label>
                    <img src="{{ asset('assets/img/search.svg') }}" alt="search" />
                </label>
                <input type="text" name="search" value="{{ old('search') }}" placeholder="ابحث في الموقع" />
            </form>
        </div>
    </div>
</nav>
