@extends("layouts.app")

@section('content')
    <div class="posts" id="test">
        <div class="container">
            {{ $post->title }}
        </div>
    </div>
@endsection

