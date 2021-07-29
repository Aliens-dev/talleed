@extends('layouts.app')

@section('title', "تعديل المقال")

@section("content")

    @if(session()->has('profile_activated'))
        <div class="modal is-active timer">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="modal-image">
                    <img src="/assets/img/logo.svg" alt="taleed Logo" />
                </div>
                <div class="modal-message">
                    {{ session()->get('profile_activated') }}
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    @endif
    <form action="{{ route('users.update', $user) }}" method="POST" class="user-profile">
        @csrf
        @method('PATCH')
        <div class="container">
            <x-user-sidebar
                :user="$user"
            >
                <button class="button is-success is-rounded">حفظ التعديلات</button>
            </x-user-sidebar>
            <div class="user-content my-card">
                <div>
                    <div class="col">
                        <div class="input-container">
                            <label for="fname">الاسم</label>
                            <input
                                type="text" name="fname" id="fname" value="{{ old('fname',$user->fname) }}"
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
                                type="text" name="lname" id="lname" value="{{ old('lname',$user->lname) }}"
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
                                type="text" name="email" id="email" value="{{ old('email',$user->email) }}"
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
                                type="text" name="social_media" id="social_media" value=""
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
                    <div class="about-author">
                        <div class="card-header is-flex is-flex-direction-column">
                            <h3 class="subtitle is-6 mb-3">نبذة عن المدون</h3>
                            <textarea class="textarea is-size-6 is-primary">لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if(session()->has('success'))
        <div class="message is-success float-bottom-right">
            <div class="message-header">
                <p>{{ session()->get('success') }}</p>
                <button class="delete" aria-label="delete"></button>
            </div>
        </div>
    @endif
@endsection
