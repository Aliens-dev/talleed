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
                        تاكيد كلمة المرور
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

