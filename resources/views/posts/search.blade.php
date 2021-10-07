@extends("layouts.app")
@section('title', "المقالات")
@section('content')
    <div class="posts-page mt-5" id="test">
        <div class="category-name">
            <div class="container">
                <div class="name">
                    البحث عن "{{ $search }}"
                </div>
            </div>
        </div>
        <div class="container">
            <div class="posts">
                @if(count($posts))
                    @foreach($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach

                    {{ $posts->links('layouts.my-pagination') }}
                @else
                    <div class="alert alert-info">
                        لا توجد اي مقالات لهذا البحث
                    </div>
                @endif
            </div>
            <x-sidebar></x-sidebar>
        </div>
    </div>
@endsection

