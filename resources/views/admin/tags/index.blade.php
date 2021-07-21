@extends('admin.layouts.auth')


@section('content')
@section('title', 'الكلمات المفتاحية')
<div>
    <h1 class="title is-4 p-3">الكلمات المفتاحية</h1>
    <livewire:tags-table />
</div>

@endsection
