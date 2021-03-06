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
                        <img src="/assets/img/thumbnail.jpg" alt="{{ $post->title }}" />
                    @endif
                    <div class="watermark-top">
                        <div class="inner"></div>
                    </div>
                    <div class="watermark-bottom">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="post-author">
                    <div class="author-card">
                        <a href="{{ route('users.profile', $post->user->id) }}" class="author-img">
                            @if(\Illuminate\Support\Facades\Storage::exists($post->user->user_image))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($post->user->user_image) }}"
                                     alt="{{ $post->user->fullname }}"
                                />
                            @else
                                <img src="/uploads/author.PNG" alt="{{ $post->user->username }}"/>
                            @endif
                        </a>
                        <div class="divider-h"></div>
                        <div class="author-info">
                            <a href="{{ route('users.profile', $post->user->id) }}" class="title is-5">
                                {{ $post->user->fullname }}
                            </a>
                            <div class="subtitle is-6 is-success">
                                {{  $post->user->speciality }}
                            </div>
                        </div>
                    </div>
                    <div class="social-share">
                        <a href="{{ $post->user->social_media_account }}">
                            <img src="/assets/img/fb_profile.svg" alt="facebook">
                        </a>
                        <a href="">
                            <img src="/assets/img/instagram_profile.svg" alt="instagram">
                        </a>
                    </div>
                </div>
                <div class="post-body mt-5 mb-3">
                    {!! $post->body !!}
                </div>
                <div id="disqus_thread"></div>
            </div>
            <div>
                <x-sidebar>
                    @if(count($post->tags))
                        <x-slot name="tags">
                            <div class="post-tags">
                                <div class="subtitle is-5 pt-2 pb-2 is-bold">
                                    ?????????????? ??????????????????
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
    <x-my-divider :line="true">
        ???????????? ???? ??????????
    </x-my-divider>
    <div class="latest-section">
        <?php
            $cat = $post->category->id;
            $posts = \App\Models\Post::where('category_id', $cat)->published()->orderBy('created_at','DESC')->take(5)->get()
        ?>
        <div class="container">
            <div class="posts">
                @foreach($posts as $post)
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
                                ???????? ????????????
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
                @endforeach
            </div>
            <div class="banner"></div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://taleed.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script>
        var disqus_config = function () {
            this.page.url = {{ request()->url() }};  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

    </script>
@endsection
