@extends("layouts.app")

@section('content')
    <div class="posts" id="test">
        <div class="container">
            @if(count($posts))
                @foreach($posts as $post)
                    <div>
                        {{ $post->title }}
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    لا توجد اية مقالات
                </div>
            @endif
        </div>
    </div>
@endsection

