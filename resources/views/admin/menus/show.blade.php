@extends('admin.layouts.auth')


@section('content')
@section('title', 'القوائم')
<div>
    <h1 class="title is-4 p-3">القائمة {{ $menu->name }}</h1>
    <livewire:admin.menus.menu-item-lists :menuId="$menu->id" />
</div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endsection
