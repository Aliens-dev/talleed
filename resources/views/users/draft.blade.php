@extends('layouts.app')

@section('title', "المسودات")

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
                        <p class="is-size-6">{{ $user->about_me }}</p>
                    </div>
                </div>
                <div class="mt-4 mb-2 p-2">
                    <h1 class="title is-4">
                        المسودات
                    </h1>
                </div>
                @if(count($posts))
                    <div class="posts">
                        @foreach($posts as $post )
                            @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                                <x-post-card
                                    :img="\Illuminate\Support\Facades\Storage::url($post->thumbnail)"
                                    :post="$post"
                                />
                            @else
                                <x-post-card
                                    img="/assets/img/thumbnail.jpg"
                                    :post="$post"
                                />
                            @endif
                        @endforeach
                    </div>
                    {{ $posts->links('layouts.my-pagination') }}
                @else
                    <div class="card pr-5 pt-2 pb-2 mt-3">
                        لا توجد مقالات
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
