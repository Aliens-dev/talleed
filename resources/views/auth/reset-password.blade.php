@extends("layouts.auth")

@section('content')
    <div class="login-page">
        <x-my-divider :hasLine="true">
            <a href="{{route('index')}}">العودة الى الرئيسية</a>
        </x-my-divider>
        <div class="container">
            <form action="{{ route('password.update') }}" method="POST" class="login-form">
                @csrf
                <div class="input-side">
                    <div class="form-title">
                        تحديث كلمة المرور
                    </div>
                    <input
                        type="hidden" name="token" value="{{ request()->route('token') }}"
                    />
                    <div class="col">
                        <div class="input-container">
                            <label for="email">الايميل</label>
                            <input
                                type="email" name="email" id="email" value="{{ request()->query('email') }}"
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="password">كلمة المرور</label>
                            <input
                                type="password" name="password" id="password"
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="password_confirmation">تاكيد كلمة المرور</label>
                            <input
                                type="password" name="password_confirmation" id="password_confirmation"
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container control">
                            <button class="button">تاكيد</button>
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
                </div>
            </form>
        </div>
    </div>
@endsection


