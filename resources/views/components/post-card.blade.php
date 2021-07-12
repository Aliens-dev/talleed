

<div class="my-card mb-2 mt-2 p-0 ml-0 mr-0 columns">
    <div class="column {{ $img_col }}">
        <img class="image" src="/uploads/main-post.PNG" alt="{{ $post->title }}" />
    </div>
    <div class="column {{ $content_col }}">
        <header class="card-header is-flex is-flex-direction-column is-justify-content-space-between">
            <h3 class="title is-20 line-height-24 mt-1 mb-2">
                {{ $post->title }}
            </h3>
            <p class="is-size-6 mt-1 mb-3">
                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
            </p>
            <a href="{{ route('post.show', $post->slug) }}">
                اقرأ المزيد
            </a>
        </header>
    </div>
</div>