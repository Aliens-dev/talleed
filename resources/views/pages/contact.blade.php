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
                <div class="col">
                    <div class="input-container">
                        <label for="type">نوع الرسالة</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="إستفسار عام" name="type">
                                إستفسار عام
                            </label>
                            <label class="radio">
                                <input type="radio" value="إستفسار حول المحتوى" name="type">
                                إستفسار حول المحتوى
                            </label>
                            <label class="radio">
                                <input type="radio" value="إتفاق إعلانات على موقع تليد" name="type">
                                إتفاق إعلانات على موقع تليد
                            </label>
                        </div>
                        @error('type')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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
            <div class="contact-side">
                <div class="wrapper"></div>
            </div>
        </form>
    </div>
@endsection
