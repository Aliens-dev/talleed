@extends("layouts.app")

@section('title', $post->title)

@section('content')
    <div class="my-post pt-2 mt-3 mb-5">
        <div class="container">
            <div class="my-card p-2 pt-4 mt-3">
                <x-settings-icon :post="$post" />
                <h1 class="title is-4">
                    {{ $post->title }}
                </h1>
                <div class="post-thumbnail">
                    @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" />
                    @else
                        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" />
                    @endif
                </div>
                <div class="post-author">
                    <div class="author-card">
                        <a href="{{ route('users.profile', $post->user->id) }}" class="author-img">
                            @if(\Illuminate\Support\Facades\Storage::exists($post->user->image))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->user->user_image) }}"
                                     alt="{{ $post->user->fullname }}"
                                />
                            @else
                                <img src="/uploads/author.PNG" alt="{{ $post->user->username }}"
                                     alt="{{ $post->user->fullname }}"
                                />
                            @endif
                        </a>
                        <div class="divider-h"></div>
                        <div class="author-info">
                            <a href="{{ route('users.profile', $post->user->id) }}" class="title is-5">
                                {{ $post->user->fullname }}
                            </a>
                            <div class="subtitle is-6 is-success">
                                باحث تاريخي
                            </div>
                        </div>
                    </div>
                    <div class="social-share">
                        <a href="">
                            <img src="/assets/img/facebook.svg" alt="facebook">
                        </a>
                        <a href="">
                            <img src="/assets/img/instagram.svg" alt="instagram">
                        </a>
                        <a href="">
                            <img src="/assets/img/twitter.svg" alt="twitter">
                        </a>
                    </div>
                </div>
                <div class="post-body mt-5 mb-3">
                    {!! $post->body !!}
                </div>
            </div>
            <div>
                <x-sidebar>
                    @if(count($post->tags))
                        <x-slot name="tags">
                            <div class="post-tags">
                                <div class="subtitle is-6 is-bold">
                                    الكلمات المفتاحية
                                </div>
                                <div class="btns is-flex">
                                    @foreach($post->tags as $tag)
                                        <div class="tag-btn">
                                            {{ $tag->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </x-slot>
                    @endif
                </x-sidebar>
            </div>
        </div>
    </div>
@endsection

