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
                :editMode="true"
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
                            <div class="select is-flex">
                                <select id="field" name="field_id" class="is-flex is-100">
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option selected="{{ $cat->id === $user->field_id }}" value="{{ $cat->id }}"> {{ $cat->name }}</option>
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
                            <label for="social_media_account">حساب التواصل الاجتماعي</label>
                            <input
                                type="text" name="social_media_account" id="social_media_account" value="{{ $user->social_media_account }}"
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
                            <label for="about_me">نبذة عني</label>
                            <textarea class="textarea" name="about_me" placeholder="اخبرنا عنك" id="about_me">{{ $user->about_me }}</textarea>
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
