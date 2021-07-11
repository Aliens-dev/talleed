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
                </div>
            </form>
        </div>
    </div>
@endsection

