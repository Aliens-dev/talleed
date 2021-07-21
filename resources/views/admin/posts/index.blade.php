@extends('admin.layouts.auth')


@section('content')
    @section('title', 'المقالات')
    <div>
        <h1 class="title is-4 p-3">قائمة المقالات</h1>
        <livewire:posts-table />
    </div>

@endsection
