@extends('admin.layouts.auth')


@section('content')
@section('title', 'المجالات')
<div>
    <h1 class="title is-4 p-3">قائمة المجالات</h1>
    <livewire:categories-table />
</div>

@endsection
