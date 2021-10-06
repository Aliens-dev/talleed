<!--
<div class="my-card mb-2 mt-2 p-0 ml-0 mr-0 columns">
    <div class="column card-img {{ $img_col }}">
        <img class="image" src="{{ $img }}" alt="{{ $post->title }}" />
        <div>
            {{ date_format($post->created_at,'d/m/Y') }}
        </div>
    </div>
    <div class="column {{ $content_col }}">
        <header class="card-header">
            <a href="{{ route('posts.show', $post->slug) }}" class="title is-20 line-height-24 mt-1 mb-2">
                {{ $post->title }}
            </a>
            <p class="card-excerpt is-size-6 mt-1 mb-3">{{ $post->excerpt }}</p>
            <a class="card-link" href="{{ route('posts.show', $post->slug) }}">
                اقرأ المزيد
            </a>
        </header>
    </div>
    <x-settings-icon :post="$post" />
</div>
-->
<div class="post">
    <x-settings-icon :post="$post" />
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
