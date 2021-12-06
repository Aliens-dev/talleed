@extends('admin.layouts.auth')


@section('title', 'قائمة الفرق')
@section('content')
    <div>
        <h1 class="title is-4 p-3">قائمة الفرق</h1>
        <livewire:admin.team.team-table />
    </div>

@endsection
