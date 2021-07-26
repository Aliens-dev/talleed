@extends('admin.layouts.auth')


@section('content')
@section('title', 'حسابي')
<div>
    <h1 class="title is-4 p-3">حسابي</h1>
    <livewire:admin.account.account-table />
</div>

@endsection
