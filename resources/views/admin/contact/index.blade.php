@extends('admin.layouts.auth')


@section('content')
@section('title', 'الرسائل')
<div>
    <h1 class="title is-4 p-3">قائمة الرسائل</h1>
    <livewire:admin.contact.contact-table />
</div>

@endsection
