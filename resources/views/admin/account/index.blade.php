@extends('admin.layouts.auth')


@section('content')
    @section('title', 'حسابي')
    <div>
        <h1 class="title is-4 p-3 mr-4 ml-4">حسابي</h1>
        <div class="admin-account mr-5 ml-5">
            @if(session()->has('success'))
                <div class="notification is-success p-1">
                    {{ session()->get('success') }}
                    <button class="delete"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">
                        <div class="container">
                            <form action="{{ route('admin.account.update') }}" method="POST" class="login-form">
                                @csrf
                                @method('PATCH')
                                <div class="input-side">
                                    <div class="col">
                                        <div class="input-container">
                                            <label for="fname">الاسم</label>
                                            <input
                                                type="text" name="fname" id="fname" value="{{ $user->fname }}"
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
                                                type="text" name="lname" id="lname" value="{{ $user->lname }}"
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
                                            <label for="username">اسم المستخدم</label>
                                            <input
                                                type="text" name="username" id="username" value="{{ $user->username }}"
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
                                            <label for="email">الايميل</label>
                                            <input
                                                type="text" name="email" id="email" value="{{ $user->email }}"
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
                                        <button class="button is-primary">حفظ</button>
                                        <input type="reset" class="button is-danger" value="الغاء">
                                    </div>
                                    @if(session()->has('extra_errors'))
                                        <div class="notification is-danger p-1 ml-5 mr-5">
                                            {{ session()->get('extra_errors') }}
                                            <button class="delete"></button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
