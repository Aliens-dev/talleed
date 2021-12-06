@extends('layouts.app')

@section("title", "فريق الادارة")

@section("content")
    <div class="container pt-2 mt-2">
        <div class="category-name">
            <div class="container">
                <div class="name">
                    ادارة الموقع
                </div>
            </div>
        </div>
        <div class='our-team'>
            <div class="container">
                <div class="card-items">
                    @foreach($teams as $team)
                        <div class='card-item'>
                            <div class='card-item-header' data-toggle='collapse'>
                                <div class='card-item-title'>{{ $team->name }}</div>
                                <img class="arrow" src="{{ asset('assets/img/chevron-c-down.svg') }}" alt="chevron">
                            </div>
                            <div class="card-item-body collapse-container" id='control-team'>
                                <div class="collapse">
                                    @foreach($team->users as $user)
                                        <div class="author-card">
                                            <a href="{{ route('users.profile', $user->id) }}" class="author-img">
                                                @if(\Illuminate\Support\Facades\Storage::exists($user->user_image))
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($user->user_image) }}"
                                                         style="width:45px;height:45px"
                                                         alt="{{$user->fname}}"
                                                    />
                                                @else
                                                    <img src="/uploads/author.PNG" width="45" height="45" alt="{{$user->fname}}" />
                                                @endif
                                            </a>
                                            <div class="divider-h"></div>
                                            <div class="author-info">
                                                <a href="{{ route('users.profile', $user->id) }}" class="title is-5">
                                                    {{ $user->fullName }}
                                                </a>
                                                <div class="subtitle is-6 is-success">
                                                    {{ $user->speciality }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
