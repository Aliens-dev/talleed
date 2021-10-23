@extends('admin.layouts.auth')


@section('content')
@section('title', 'القوائم')
<div>
    <h1 class="title is-4 p-3">القوائم</h1>
    <livewire:admin.menus.menu-table />
</div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endsection
