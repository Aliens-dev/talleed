<div class="sidebar">
    @if(isset($tags))
        <div class="side-item">
            {{ $tags }}
        </div>
    @endif
    <div class="side-item">
        <div class="tabs">
            <ul>
                <li class="is-active">
                    <a data-toggle="popular-section">الاكثر شعبية</a>
                </li>
                <li>
                    <a data-toggle="categories-section">المجالات</a>
                </li>
            </ul>
        </div>
        <div class="tabs-content">
            <div class="items show" id="popular-section">
                @foreach($popularPosts as $post)
                    <div class="post">
                        <div class="post-thumbnail">
                            @if(\Illuminate\Support\Facades\Storage::exists($post->thumbnail))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" />
                            @else
                                <img src="/assets/img/thumbnail.jpg" alt="{{ $post->title }}" />
                            @endif
                        </div>
                        <div class="post-info">
                            <a href="{{ route('posts.show', $post->slug) }}" class="post-title is-link">
                                {{ $post->title }}
                            </a>
                            <div class="post-subinfo">
                                <a href="{{ route('users.profile', $post->user->id) }}">
                                    {{ $post->user->fullname }}
                                </a>
                                <div class="post-date">
                                    {{ \Carbon\Carbon::parse($post->created_at)->locale('ar')->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="items" id="categories-section">
                @foreach($categories as $category)
                    <div class="item">
                        <a class="is-link" href="{{ route('category.posts.index', $category->slug) }}" >
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
