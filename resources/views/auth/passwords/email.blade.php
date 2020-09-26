@extends('layouts.app')

@section('content')

<div class="header-content">
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered" style="font-family: 'Rock Salt', cursive;">
                <h1 class="title is-1 is-spaced">
                    {{ __('Reset Password') }}
                </h1>
            </div>
        </div>
    </section>
</div>
<!-- this is the main page content -->
<div class="main-content mt-4">
    <div class="container">
        <div class="columns is-multiline is-centered">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-8">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="box">
                        @if (session('status'))
                        <div class="has-text-danger">
                            <span class="is-danger">{{ session('status') }}</span>
                        </div>
                        @endif
                        <div class="field">
                            <label class="label">{{ __('E-Mail Address') }}</label>
                            <div class="control">
                                <input class="input @error('email') is-danger @enderror" type="email"
                                    placeholder="isim@birsey.com" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                            </div>
                            @error('email')<p class="has-text-danger">{{ $message }}</p>@enderror
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">   {{ __('Send Password Reset Link') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of main page content -->

@endsection