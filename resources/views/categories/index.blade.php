@extends("layouts.app")

@section('title', $category->name)

@section('content')
    <div class="posts-page" id="test">
        <div class="container">
            <div class="posts">
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
