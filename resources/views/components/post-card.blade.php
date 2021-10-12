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
        <div class="img">
            @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" />
            @else
                <img src="/assets/img/thumbnail.jpg" alt="{{ $post->title }}" />
            @endif
            <div class="watermark-top">
                <div class="inner"></div>
            </div>
            <div class="watermark-bottom">
                <div class="inner"></div>
            </div>
        </div>
        <div class="post-date">
            {{ date_format($post->created_at,'d/m/Y') }}
        </div>
    </div>
</div>
