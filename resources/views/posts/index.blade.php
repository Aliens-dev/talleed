@extends("layouts.app")
@section('title', "المقالات")
@section('content')
    <div class="posts-page" id="test">
        <div class="category-name">
            <div class="container">
                <div class="name">
                    المقالات
                </div>
            </div>
        </div>
        <div class="container">
            <div class="posts mt-3">
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

