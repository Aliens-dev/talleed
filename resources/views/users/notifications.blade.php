@extends('layouts.app')
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
    <div class="user-profile">
        <div class="container">
            <x-user-sidebar
                :user="$user"
            >
                <div class="mb-2">
                    <a href="{{route('posts.create')}}" class="button min-w-140 is-primary is-rounded">اضافة مقالة</a>
                </div>
                <div class="mt-2">
                    <a href="{{route('users.edit', $user->id)}}" class="button min-w-140 is-link is-rounded">تعديل الحساب</a>
                </div>
            </x-user-sidebar>
            <div class="user-content">
                <div class="my-card p-5 about-author">
                    <div class="card-header is-flex is-flex-direction-column">
                        <h3 class="title is-5 mb-3">نبذة عن المدون</h3>
                        <p class="is-size-6">
                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                        </p>
                    </div>
                </div>
                <div class="mt-4 mb-2 p-2">
                    <h1 class="title is-4">
                        الاشعارات
                    </h1>
                </div>
                @if(count($user->notifications))
                    @foreach($user->notifications as $notification )
                        <div class="message is-primary mb-1">
                            <div class="message-header pt-0 pb-0 pl-1 pr-1">
                                <button class="delete"></button>
                                {{ $notification->data['message'] }}
                                <div class="message-body has-text-white p-2">
                                    {{ \Carbon\Carbon::parse($notification->data['time'])->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('components.pagination')
                @else
                    <div class="card pr-5 pt-2 pb-2 mt-3">
                        لا توجد مقالات
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
