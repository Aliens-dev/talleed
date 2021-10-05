@extends("layouts.app")
@section('title', "الرئيسية")
@section('content')
    <div class="section-page">
        <div class="page-header">
            <div class="container">
                <div class="main-post">
                    <div class="post-img">
                        @if(\Illuminate\Support\Facades\Storage::exists($latest[0]->thumbnail))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($latest[0]->thumbnail) }}" alt="{{ $latest[0]->title }}" />
                        @else
                            <img src="/assets/img/thumbnail.jpg" alt="{{ $latest[0]->title }}" />
                        @endif
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
                    @foreach($latest as $post)
                        <div class="post">
                            <div class="post-img">
                                @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" />
                                @else
                                    <img src="/assets/img/thumbnail.jpg" alt="{{ $post->title }}" />
                                @endif
                            </div>
                            <div class="post-info">
                                <div class="post-title">
                                    <a href="{{ route('posts.show', $post->slug) }}" >
                                        {{ $post->title }}
                                    </a>
                                </div>
                                <div class="post-excerpt">
                                    {{ $post->excerpt }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <x-my-divider :line="true">
            المواضيع الاكثر قراءة
        </x-my-divider>
        <div class="latest-section">
            <div class="container">
                <div class="posts">
                    @foreach($topRead as $post)
                        <div class="post">
                            <div class="post-info">
                                <div class="post-title">
                                    <a href="{{ route('posts.show', $post->slug) }}" >
                                        {{ $post->title }}
                                    </a>
                                </div>
                                <div class="post-excerpt">
                                    {{ $post->excerpt }}
                                </div>
                                <a href="{{ route('posts.show', $post->slug) }}" class="more-button">
                                    اقرأ المزيد
                                </a>
                            </div>
                            <div class="post-img is-flex is-flex-direction-column">
                                @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" />
                                @else
                                    <img src="/assets/img/thumbnail.jpg" alt="{{ $post->title }}" />
                                @endif
                                <div class="post-date">
                                    {{ date_format($post->created_at,'d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="banner"></div>
            </div>
            <x-my-divider :line="true">
                <a href="{{ route('posts.index') }}">
                    مشاهدة كل التدوينات
                </a>
            </x-my-divider>
        </div>
    </div>
@endsection

