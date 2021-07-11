@extends("layouts.auth")

@section('content')
    <div class="login-page">
        <x-my-divider :hasLine="true">
            <a href="{{route('index')}}">العودة الى الرئيسية</a>
        </x-my-divider>
        <div class="container">
            <form action="" method="POST" class="login-form">
                @csrf

                <div class="input-side">
                    <div class="form-title">
                        تسجيل الدخول
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="email">الايميل</label>
                            <input
                                type="text" name="email" id="email" value="{{ old('email') }}"
                            />
                            @error('email')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="password">كلمة المرور</label>
                            <input
                                type="password" name="password" id="password"
                            />
                            @error('password')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container control">
                            <button class="button">الدخول</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <a href="{{ route('register') }}" >
                                انشاء حساب ؟
                            </a>
                        </div>
                        <div class="input-container">
                            <a href="{{ route('password.request') }}" >
                                نسيت كلمة المرور ؟
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-side">
                    <div class="wrapper"></div>
                </div>
            </form>
        </div>
    </div>
@endsection

