@extends('admin.layouts.auth')


@section('content')
@section('title', 'الرسائل')
<div>
    <h1 class="title is-4 p-3">مشاهدة الرسالة</h1>
    <div class="my-card user-card w-500 m-center p-5">
        <div class="no-box-shadow is-two-fifths is-flex is-align-items-center">
            <div class="user-profile-info is-three-fifths">
                <h5 class="title is-6">
                    {{ $contact->subject }}
                </h5>
                <p class="title is-5 mb-5">
                    {{ $contact->email }}
                </p>
                <p class="subtitle is-5">
                    {{ $contact->type }}
                </p>
            </div>
        </div>
        <div>
            <h3 class="title is-5 mb-3">الرسالة</h3>
            <p class="is-size-6">
                {{ $contact->message }}
            </p>
        </div>
    </div>
</div>

@endsection
