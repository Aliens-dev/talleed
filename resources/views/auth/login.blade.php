@extends("layouts.auth")

@section('title', 'الدخول الى حسابي')

@section('content')
    @if(session()->has('success'))
        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-content">
                <x-my-divider :line="false">
                    <a href="{{route('index')}}">العودة الى الرئيسية</a>
                </x-my-divider>
                <div class="modal-image">
                    <img src="/assets/img/logo-invert.svg" alt="taleed Logo" />
                </div>
                <div class="modal-message">
                    {{ session()->get('success') }}
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    @endif
    <div class="login-page">
        <x-my-divider :hasLine="true">
            <a href="{{route('index')}}">العودة الى الرئيسية</a>
        </x-my-divider>
        <div class="container">
            <form action="{{ route('login') }}" method="POST" class="login-form">
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
                    <div></div>
                    <div class="auth-brand">
                        <div class="auth-col-social">
                            <a href="">
                                <img src="/assets/img/twitter.svg" style="width:35px;height: 35px" alt="twitter taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/youtube.svg" style="width:35px;height: 35px"  alt="youtube taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/instagram.svg" style="width:30px;height: 35px"  alt="instagram taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/facebook.svg" style="width:30px;height: 35px"  alt="facebook taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/telegram.svg" style="width:35px;height: 35px"  alt="telegram taleed" />
                            </a>
                        </div>
                        <div class="auth-logo">
                            <img src="{{ asset('./assets/img/logo.svg') }}" alt="taleed" />
                        </div>
                        <div class="auth-rights">
                            جميع الحقوق محفوظة @ 2021 موقع تليد
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

