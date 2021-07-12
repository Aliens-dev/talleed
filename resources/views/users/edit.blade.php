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
                    <button class="button is-link is-rounded">تعديل الحساب</button>
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
                    @if(count($user->posts))
                        @foreach($user->posts as $post )
                            <x-post-card 
                                img="/uploads/main-post.PNG"
                                :post="$post"
                            />
                        @endforeach
                        @include('components.pagination')
                    @else
                        <div>لا توجد مقالات</div>
                    @endif
                </div>
            </div>
        </div>

    @endsection
