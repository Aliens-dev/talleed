
<div class="my-card mb-2 mt-2 p-0 ml-0 mr-0 columns">
    <div class="column {{ $img_col }}">
        <img class="image" src="{{ $img }}" alt="{{ $post->title }}" />
    </div>
    <div class="column {{ $content_col }}">
        <header class="card-header is-flex is-flex-direction-column is-justify-content-space-between">
            <h3 class="title is-20 line-height-24 mt-1 mb-2">
                {{ $post->title }}
            </h3>
            <p class="is-size-6 mt-1 mb-3">{{ $post->excerpt }}</p>
            <a href="{{ route('posts.show', $post->slug) }}">
                اقرأ المزيد
            </a>
        </header>
    </div>
    <x-settings-icon :post="$post" />
</div>
