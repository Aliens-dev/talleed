@extends("layouts.auth")

@section('title', 'تسجيل مستخدم جديد')

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
            <form action="{{ route('register.post') }}" method="POST" class="register-form" enctype="multipart/form-data">
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
                            <div class="select is-flex">
                                <select id="field" name="field_id" class="is-flex is-100">
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('field')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <label for="username">اسم المستخدم</label>
                            <input
                                type="text" name="username" id="username" value="{{ old('username') }}"
                            />
                            @error('username')
                            <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                <span class="delete"></span>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="about_me">نبذة عنك</label>
                            <textarea class="textarea" name="about_me" placeholder="اخبرنا عنك" id="about_me">{{ old('about_me') }}</textarea>
                            @error('about_me')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="social_media_account">حساب التواصل الاجتماعي</label>
                            <input
                                type="text" name="social_media_account" id="social_media_account" value="{{ old('social_media_account') }}"
                                placeholder="فيسبوك,تويتر او انستغرام"
                            />
                            @error('social_media_account')
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
                    <div class="image-container">
                        <div class="user-image" >
                            <img id="user_icon" src="/assets/img/user-icon.svg" alt="user_image" />
                        </div>
                        <input class="is-hidden" type="file" name="user_image" id="user_image" />
                        <label for="user_image">صورتك الشخصية</label>
                        @error('user_image')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

