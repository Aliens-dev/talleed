@extends('admin.layouts.auth')

@section('content')

@section('title', $user->fullname)
<div>
    <h1 class="title is-4 p-3">معلومات عن المدون</h1>
    <div class="my-card user-card w-500 m-center p-5">
        <div class="no-box-shadow is-two-fifths is-flex is-align-items-center">
            <div class="user-profile-picture is-two-fifths">
                @if(\Illuminate\Support\Facades\Storage::exists($user->user_image))
                    <figure class="image is-96x96">
                        <img class="is-rounded"
                             src="{{ \Illuminate\Support\Facades\Storage::url($user->user_image) }}"
                             alt="{{ $user->username }}">
                    </figure>
                @else
                    <figure class="image is-96x96">
                        <img class="is-rounded " src="/uploads/man.svg" alt="user profile">
                    </figure>
                @endif
            </div>
            <div class="user-profile-info is-three-fifths">
                <h5 class="title is-6">
                    {{ $user->fullname }}
                </h5>
                <p class="title is-5 mb-5">
                    {{ $user->email }}
                </p>
                <p class="subtitle is-5">
                    {{ \App\Models\Category::find($user->field_id)->name }}
                </p>
            </div>
        </div>
        <div>
            <h3 class="title is-5 mb-3">نبذة عن المدون</h3>
            <p class="is-size-6">
                {{ $user->about_me }}
            </p>
        </div>
        <div>
            <h3 class="title is-5 mb-3">حساب التواصل الاجتماعي</h3>
            <p class="is-flex is-size-6">
                <a href="{{ $user->social_media_account }}" target="_blank" class="button is-info">
                    اضغط هنا
                </a>
            </p>
        </div>
        <div class="is-flex">
            <a href="{{ route('users.edit', $user->id) }}" class="button is-primary">تعديل</a>
            @if($user->user_status == 'pending')
                <form class="mr-2" action="{{ route('admin.users.status', $user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="activated" />
                    <button class="button is-success">تفعيل الحساب</button>
                </form>
            @else
                <form class="mr-2" action="{{ route('admin.users.status', $user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="pending" />
                    <button class="button is-danger">تعليق الحساب</button>
                </form>
            @endif
        </div>
    </div>
</div>

@endsection
