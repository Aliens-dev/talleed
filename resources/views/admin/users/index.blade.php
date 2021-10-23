@extends('admin.layouts.auth')


@section('content')
    @section('title', 'المدونين')
    <div>
        <h1 class="title is-4 p-3">قائمة المدونين</h1>
        <livewire:admin.user.users-table />
    </div>
@endsection
