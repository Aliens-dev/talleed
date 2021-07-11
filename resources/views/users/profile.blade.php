@extends('layouts.app')

    @section("content")

        @if(session()->has('profile_activated'))
            <div class="modal is-active timer">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="modal-image">
                        <img src="/assets/img/logo.svg" alt="taleed Logo" />
                    </div>
                    <div class="modal-message">
                        {{ session()->get('profile_activated') }}
                    </div>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
        @endif
        <div class="user-profile">
            <div class="container">

            </div>
        </div>

    @endsection
