@extends("layouts.app")

@section('content')
    <div class="section-page">
        <div class="page-header">
            <div class="container">
                <div class="main-post">
                    <div class="post-img">
                        <img src="{{ asset('uploads/main-post.PNG') }}" alt="" />
                    </div>
                    <div class="post-title">
                        <a href="{{ route('posts.show', $latest[0]->slug) }}" >
                            {{ $latest[0]->title }}
                        </a>
                    </div>
                    <div class="post-excerpt">
                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء
                    </div>
                </div>
                <?php $latest = $latest->splice(1) ?>
                <div class="sub-posts">
                    @foreach($latest as $post)
                        <div class="post">
                            <div class="post-img">
                                <img src="{{ asset('uploads/main-post.PNG') }}" alt="" />
                            </div>
                            <div class="post-info">
                                <div class="post-title">
                                    <a href="{{ route('posts.show', $post->slug) }}" >
                                        {{ $post->title }}
                                    </a>
                                </div>
                                <div class="post-excerpt">
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.
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
        <div class="section">
            <div>

            </div>
        </div>
    </div>
@endsection

