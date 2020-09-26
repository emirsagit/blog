@extends('layouts.app')

@section('content')
<div class="header-content">
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered" style="font-family: 'Rock Salt', cursive;">
                <h1 class="title is-1 is-spaced">
                    Kayıt Ol
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
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="box">
                        <header class="card-header mb-4">
                            <p class="card-header-title">
                                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                                Hoşgeldiniz.</a>
                            </p>
                        </header>

                        <div class="field">
                            <label class="label">Adınız</label>
                            <div class="control">
                                <input class="input @error('name') is-danger @enderror" type="text" placeholder="Adınız"
                                    name="name" value="{{ old('name') }}">
                            </div>
                            @error('name')<p class="has-text-danger">{{ $message }}</p>@enderror
                        </div>

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
                                    placeholder="şifre" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')<p class="has-text-danger">{{ $message }}</p>@enderror
                        </div>

                        <div class="field">
                            <label class="label">Şifre</label>
                            <div class="control">
                                <input id="password-confirm" class="input" type="password" placeholder="şifre"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link"> {{ __('Register') }}</button>
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