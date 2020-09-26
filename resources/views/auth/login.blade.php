@extends('layouts.app')

@section('content')

<div class="header-content">
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered" style="font-family: 'Rock Salt', cursive;">
                <h1 class="title is-1 is-spaced">
                    Giriş
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
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="box">
                        <header class="card-header mb-4">
                            <p class="card-header-title">
                                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                                Hoşgeldiniz. Üye değilseniz<a href="{{ route('register') }}">&nbsp Kayıt Olun</a>
                            </p>
                        </header>
                        <div class="field">
                            <label class="label">E-Posta Adresi</label>
                            <div class="control">
                                <input class="input @error('email') is-danger @enderror" type="email"
                                    placeholder="isim@birsey.com" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                            </div>
                            @error('email')<p class="has-text-danger">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label class="label">Şifre</label>
                            <div class="control">
                                <input class="input @error('password') is-danger @enderror" type="password"
                                    placeholder="şifre" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')<p class="has-text-danger">{{ $message }}</p>@enderror
                        </div>


                        <div class="field">
                            <div class="control">
                                <label class="checkbox" for="remember">
                                    <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link"> {{ __('Login') }}</button>
                            </div>
                            <div class="control">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
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