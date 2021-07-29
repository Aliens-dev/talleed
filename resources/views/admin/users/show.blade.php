@extends('admin.layouts.auth')


@section('content')
@section('title', $user->fullname)
<div>
    <h1 class="title is-4 p-3">معلومات عن المدون</h1>
    <div class="my-card user-card w-500 m-center p-5">
        <div class="no-box-shadow is-two-fifths is-flex is-align-items-center">
            <div class="user-profile-picture is-two-fifths">
                <figure class="image is-96x96">
                    <img class="is-rounded " src="/uploads/man.svg" alt="user profile">
                </figure>
            </div>
            <div class="user-profile-info is-three-fifths pr-5">
                <h5 class="title is-6">
                    {{ $user->fullname }}
                </h5>
                <p class="title is-5 mb-5">
                    {{ $user->email }}
                </p>
                <p class="subtitle is-5">باحث تاريخي</p>
            </div>
        </div>
        <div>
            <h3 class="title is-5 mb-3">نبذة عن المدون</h3>
            <p class="is-size-6">
                لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
            </p>
        </div>
        <div>
            <h3 class="title is-5 mb-3">حساب التواصل الاجتماعي</h3>
            <p class="is-flex is-size-6">
                <a href="http://127.0.0.1:8000/panel_admin/users/58" class="button is-info">
                    اضغط هنا
                </a>
            </p>
        </div>
        <div class="is-flex">
            <button class="button is-primary">تعديل</button>
        </div>
    </div>

</div>

@endsection
