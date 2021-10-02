@extends("layouts.app")
@section('title', "المقالات")
@section('content')
    <div class="posts-page" id="test">
        <div class="container">
            <div class="posts">
                @if(count($posts))
                    @foreach($posts as $post)
                        <x-post-card
                            :post="$post"
                            :img="\Illuminate\Support\Facades\Storage::url($post->thumbnail)"
                        />
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

