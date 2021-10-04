
<div class="my-card mb-2 mt-2 p-0 ml-0 mr-0 columns">
    <div class="column {{ $img_col }}">
        <img class="image" src="{{ $img }}" alt="{{ $post->title }}" />
    </div>
    <div class="column {{ $content_col }}">
        <header class="card-header">
            <a href="{{ route('posts.show', $post->slug) }}" class="title is-20 line-height-24 mt-1 mb-2">
                {{ $post->title }}
            </a>
            <p class="is-size-6 mt-1 mb-3">{{ $post->excerpt }}</p>
            <a class="card-link" href="{{ route('posts.show', $post->slug) }}">
                اقرأ المزيد
            </a>
        </header>
    </div>
    <x-settings-icon :post="$post" />
</div>
