@extends("layouts.auth")

@section('content')

    @if(session()->has('success'))
        <div class="modal is-active timer">
            <div class="modal-background"></div>
            <div class="modal-content">
                <x-my-divider :line="false">
                    <a href="{{route('index')}}">العودة الى الرئيسية</a>
                </x-my-divider>
                <div class="modal-image">
                    <img src="/assets/img/logo.svg" alt="taleed Logo" />
                </div>
                <div class="modal-message">
                    تم التسجيل بنجاح, من فضلك تفقد ايميلك لتفعيل الحساب
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    @endif
    <div class="register-page">
        <x-my-divider :line="true">
            <a href="{{route('index')}}">العودة الى الرئيسية</a>
        </x-my-divider>
        <div class="container">
            <form action="{{ route('register.post') }}" method="POST" class="register-form">
                @csrf
                <div class="input-side">
                    <div class="form-title">
                        التسجيل
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="fname">الاسم</label>
                            <input
                                type="text" name="fname" id="fname" value="{{ old('fname') }}"
                            />
                            @error('fname')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <label for="lname">اللقب</label>
                            <input
                                type="text" name="lname" id="lname" value="{{ old('lname') }}"
                            />
                            @error('lname')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="field">المجال</label>
                            <input
                                type="text" name="field" id="field" value="{{ old('field') }}"
                            />
                            @error('field')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <label for="status">الحالة</label>
                            <input
                                type="text" name="status" id="status" value="{{ old('status') }}"
                            />
                            @error('status')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                            <label for="social_media">حساب التواصل الاجتماعي</label>
                            <input
                                type="text" name="social_media" id="social_media" value="social_media"
                            />
                            @error('social_media')
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
                        <div class="input-container">
                            <label for="password_confirmation">تاكيد كلمة المرور</label>
                            <input
                                type="password" name="password_confirmation" id="password_confirmation"
                            />
                            @error('password_confirmation')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container control">
                            <button class="button">التسجيل</button>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{route('login')}}" class="underline text-sm text-gray-600 hover:text-gray-900">
                            لديك حساب ؟
                        </a>
                    </div>
                </div>
                <div class="form-side">
                    <div class="wrapper"></div>
                </div>
            </form>
        </div>
    </div>
@endsection

