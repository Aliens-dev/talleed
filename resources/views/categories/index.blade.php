@extends("layouts.app")

@section('title', $category->name)

@section('content')
    <div class="section-page">
        <div class="page-header">
            <div class="category-name">
                <div class="container">
                    <div class="name">
                        {{ $category->name }}
                    </div>
                </div>
            </div>
            @if(count($posts))
                <div class="container">
                    <div class="main-post">
                        <div class="post-img">
                            <div class="img">
                                @if(\Illuminate\Support\Facades\Storage::exists($latest[0]->thumbnail))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($latest[0]->thumbnail) }}" alt="{{ $latest[0]->title }}" />
                                @else
                                    <img src="/assets/img/thumbnail.jpg" alt="{{ $latest[0]->title }}" />
                                @endif
                                <div class="watermark-top">
                                    <div class="inner"></div>
                                </div>
                                <div class="watermark-bottom">
                                    <div class="inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="{{ route('posts.show', $latest[0]->slug) }}" >
                                {{ $latest[0]->title }}
                            </a>
                        </div>
                        <div class="post-excerpt">
                            {{ $latest[0]->excerpt }}
                        </div>
                    </div>
                    <?php $latest = $latest->splice(1) ?>
                    <div class="sub-posts">
                        @foreach($latest as $p)
                            <div class="post">
                                <div class="post-img">
                                    <div class="img">
                                        @if(\Illuminate\Support\Facades\Storage::exists($p->thumbnail))
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($p->thumbnail) }}" alt="{{ $p->title }}" />
                                        @else
                                            <img src="/assets/img/thumbnail.jpg" alt="{{ $p->title }}" />
                                        @endif
                                        <div class="watermark-top">
                                            <div class="inner"></div>
                                        </div>
                                        <div class="watermark-bottom">
                                            <div class="inner"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <div class="post-title">
                                        <a href="{{ route('posts.show', $p->slug) }}" >
                                            {{ $p->title }}
                                        </a>
                                    </div>
                                    <div class="post-excerpt">
                                        {{ $p->excerpt }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if(count($posts))
        <x-my-divider :line="true">
            {{ $category->name }}
        </x-my-divider>
    @endif
    <div class="posts-page" id="test">
        <div class="container">
            <div class="posts mt-1">
                @if(count($posts))
                    @foreach($posts as $post)
                        @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                            <x-post-card
                                :post="$post"
                                :img="\Illuminate\Support\Facades\Storage::url($post->thumbnail)"
                            />
                        @else
                            <x-post-card
                                :post="$post"
                                img="/assets/img/thumbnail.jpg"
                            />
                        @endif
                    @endforeach
                    {{ $posts->links('layouts.my-pagination') }}
                @else
                    <div class="alert alert-info">
                        لا توجد اية مقالات
                    </div>
                @endif
            </div>
            <x-sidebar></x-sidebar>
        </div>
    </div>
@endsection
