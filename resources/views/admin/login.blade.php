@extends("admin.layouts.app")

@section('content')
    <div class="admin-login">
        <div class="container">
            <form action="{{ route('admin.login.post') }}" method="POST" class="login-form">
                @csrf
                <div class="input-side">
                    <div class="form-title">
                        تسجيل دخول ادمين
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
                </div>
            </form>
        </div>
    </div>
@endsection


