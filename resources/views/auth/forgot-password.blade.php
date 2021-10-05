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
                        نسيت كلمة المرور ؟
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="email">الايميل</label>
                            <input
                                type="email" name="email" id="email"
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container control">
                            <button class="button">ارسال</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <a href="{{ route('register') }}" >
                                انشاء حساب ؟
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

