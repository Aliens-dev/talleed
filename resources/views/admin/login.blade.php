@extends('admin.layouts.app')

    @section('content')

        <div class="admin-login">
            <div class="container">
                <form action="{{ route('admin.login.post') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input is-success" name="email" type="email" placeholder="Your email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input is-danger" name="password" type="password" placeholder="Your password">
                        </div>
                        @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                        <div class="control">
                            <input type="reset" class="button is-link is-light" value="Reset" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
