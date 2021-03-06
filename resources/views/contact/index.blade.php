@extends('layouts.app')

@section('head')
<title>{{ $setting->contactSeoTitle }}</title>
<meta name="description" content="{{ $setting->contactSeoDescription }}">
@endsection

@section('content')

<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns is-8 is-variable ">
                <div class="column is-half has-text-left">
                    <h1 class="title is-2">{{ $setting->contactTitle }}</h1>
                    <p class="is-size-4">{{ $setting->contactSubtitle }}</p>
                    <div class="navbar-brand">
                        <x-social-media-partial />
                    </div>
                    @isset ($setting->tel)
                    <p class="is-size-5">
                        Telefon: <a href="tel:{{ $setting->tel }}">{{ $setting->tel }}</a>
                    </p>
                    @endisset
                    @isset ($setting->email)
                    <p class="is-size-5">
                        Mail Adresimiz: <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                    </p>
                    @endisset
                </div>
                <div class="column is-half has-text-left">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="box">
                            <div class="field">
                                <label class="label">Adınız</label>
                                <div class="control">
                                    <input class="input @error('name') is-danger @enderror" type="text"
                                        placeholder="Adınız" name="name" value="{{ old('name') }}">
                                </div>
                                @error('name')<p class="has-text-danger">{{ $message }}</p>@enderror
                            </div>

                            <div class="field">
                                <label class="label">Mail Adresiniz</label>
                                <div class="control">
                                    <input class="input @error('email') is-danger @enderror" type="email"
                                        placeholder="Mail Adresiniz" name="email" value="{{ old('email') }}">
                                </div>
                                @error('email')<p class="has-text-danger">{{ $message }}</p>@enderror
                            </div>

                            <div class="field">
                                <label class="label">Telefon</label>
                                <div class="control">
                                    <input class="input @error('tel') is-danger @enderror" type="tel"
                                        placeholder="Telefon" name="tel" value="{{ old('tel') }}">
                                </div>
                                @error('tel')<p class="has-text-danger">{{ $message }}</p>@enderror
                            </div>

                            <div class="field">
                                <label class="label">Konu</label>
                                <div class="control">
                                    <textarea class="textarea @error('body') is-danger @enderror" placeholder="İçerik"
                                        name="body" rows="10">
                                {{ old('body') }}
                            </textarea>
                                </div>
                                @error('body')<p class="has-text-danger">{{ $errors->first('body') }}</p>@enderror
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link">Kaydet</button>
                                </div>
                                <div class="control">
                                    <a class="button is-link is-light" href="{{ url()->previous() }}">Geri</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <div class="header-content">
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered" style="font-family: 'Rock Salt', cursive;">
                <h1 class="title is-1 is-spaced">
                    İletişim
                </h1>
                <h3 class="subtitle is-3">
                    <i>İletişim için lütfen formu doldurunuz...</i>
                </h3>
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
                <form action="{{ route('contact.store') }}" method="POST">
@csrf
<div class="box">
    <div class="field">
        <label class="label">Adınız</label>
        <div class="control">
            <input class="input @error('name') is-danger @enderror" type="text" placeholder="Adınız" name="name"
                value="{{ old('name') }}">
        </div>
        @error('name')<p class="has-text-danger">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label class="label">Mail Adresiniz</label>
        <div class="control">
            <input class="input @error('email') is-danger @enderror" type="email" placeholder="Adınız" name="email"
                value="{{ old('email') }}">
        </div>
        @error('email')<p class="has-text-danger">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label class="label">Telefon</label>
        <div class="control">
            <input class="input @error('tel') is-danger @enderror" type="tel" placeholder="Telefon" name="tel"
                value="{{ old('tel') }}">
        </div>
        @error('tel')<p class="has-text-danger">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label class="label">Konu</label>
        <div class="control">
            <textarea class="textarea @error('body') is-danger @enderror" placeholder="İçerik" name="body" rows="10">
                            {{ old('body') }}
                        </textarea>
        </div>
        @error('body')<p class="has-text-danger">{{ $errors->first('body') }}</p>@enderror
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link">Kaydet</button>
        </div>
        <div class="control">
            <a class="button is-link is-light" href="{{ url()->previous() }}">Geri</a>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- end of main page content --> --}}
@endsection