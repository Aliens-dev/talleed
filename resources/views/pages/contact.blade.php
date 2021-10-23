@extends('layouts.app')

@section("title", "تواصل معنا")

@section("content")
    @if(session()->has('success'))
        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-content">
                <x-my-divider :line="false">
                    <a href="{{route('index')}}">العودة الى الرئيسية</a>
                </x-my-divider>
                <div class="modal-image">
                    <img src="/assets/img/logo.svg" alt="taleed Logo" />
                </div>
                <div class="modal-message">
                     {{ session()->get('success') }}
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    @endif
    <div class="container pt-2 mt-2">
        <form action="{{ route('contact') }}" method="POST" class="contact-form">
            @csrf
            <div class="input-side">
                <div class="form-title">
                    تواصل معنا
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="subject">الموضوع</label>
                        <input
                            type="text" name="subject" id="subject" value="{{ old("subject") }}"
                        />
                        @error('subject')
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
                <div class="col is-flex is-flex-direction-column">
                    <label for="type">نوع الرسالة</label>
                    <div class="select">
                        <select id="type" class="input-container" name="type">
                            <option value="إستفسار عام">
                                إستفسار عام
                            </option>
                            <option value="إستفسار حول المحتوى">
                                إستفسار حول المحتوى
                            </option>
                            <option value="إتفاق إعلانات على موقع تليد">
                                إتفاق إعلانات على موقع تليد
                            </option>
                        </select>
                    </div>
                    @error('type')
                    <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                        <span class="delete"></span>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="message">الرسالة</label>
                        <textarea class="textarea" name="message" id="message">{{ old('message') }}</textarea>
                        @error('email')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-container control">
                        <button class="button">ارسال</button>
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
@endsection
