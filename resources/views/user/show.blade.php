@extends('layouts.app')

@section('head')
<title>{{ $user->name }} | Özgeçmişi | İletişim Bilgileri</title>
<meta name="description" content="{{ $user->name }} isimli yazarımızın güncel yazılarını, iletişim bilgilerini, özgeçmişini görüntüleyip kendisiyle iletişime geçebilirsiniz.">
@endsection

@section('content')

<x-title-partial :title="$user->name" />

<!-- this is the main page content -->
<div class="main-content">
    <div class="container">
        <div class="columns">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-8">
                <div class="box">
                    <article class="media">
                        <div class="media-left">
                            @if($user->thumbnail)
                            <figure class="image is-128x128">
                                <img src="{{ $user->thumbnail }}" alt="{{ $user->name }}" loading="lazy">
                            </figure>
                            @endif
                        </div>
                        <div class="media-content">
                            <div class="content">
                                <p class="title is-4">{{ $user->name }}<span class="tag ml-1">{{ $user->email }}</span>
                                    <p>{{ $user->about }}</p>
                                    <div class="columns is-mobile">
                                        @if($user->facebook)
                                        <a class="navbar-item is-tab" href="{{ url($user->facebook) }}"  target="_blank">
                                            <span class="icon">
                                                <img src="/img/facebook.svg" alt="facebook" class="image is-24x24">
                                            </span>
                                        </a>
                                        @endif
                                        @if($user->instagram)
                                        <a class="navbar-item is-tab" href="{{ url($user->instagram) }}"  target="_blank">
                                            <span class="icon">
                                                <img src="/img/instagram.svg" alt="instagram" class="image is-24x24">
                                            </span>
                                        </a>
                                        @endif
                                        @if($user->twitter)
                                        <a class="navbar-item is-tab" href="{{ url($user->twitter) }}"  target="_blank">
                                            <span class="icon">
                                                <img src="/img/twitter.svg" alt="twitter" class="image is-24x24">
                                            </span>
                                        </a>
                                        @endif
                                        @if($user->linkedin)
                                        <a class="navbar-item is-tab" href="{{ url($user->linkedin) }}"  target="_blank">
                                            <span class="icon">
                                                <img src="/img/linkedin.svg" alt="linkedin" class="image is-24x24">
                                            </span>
                                        </a>
                                        @endif
                                        @if($user->github)
                                        <a class="navbar-item is-tab" href="{{ url($user->github) }}"  target="_blank">
                                            <span class="icon">
                                                <img src="/img/github.svg" alt="github" class="image is-24x24">
                                            </span>
                                        </a>
                                        @endif
                                    </div>
                                    <div>
                                        @if($user->interests)
                                        <h5>Uzmanlık Alanları: </h5>
                                        @foreach ($user->interests as $interest)
                                        <span class="tag is-danger is-light">{{ $interest }}</span>
                                        @endforeach
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </article>
                    <hr>
                    <header class="card-header-fix-center has-text-centered mb-4">
                        <p class="card-header-title-fix">
                            Yazıları
                        </p>
                    </header>
                    @foreach ($user->articles as $article)
                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                {{ $article->updated_at->diffForHumans() }}
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <a class="is-link">{{ $article->title }}</a>
                                @if($article->subtitle)
                                <p>{{ $article->subtitle }}</p>
                                @else
                                <p>{!! Str::limit($article->body, 200) !!}</p>
                                @endif
                                <a class="is-link" href="{{ route('article.show', compact('article')) }}">Devamını oku</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            @isset($tags)
            <div class="column is-4 is-narrow">
                <x-category-partial :tags="$tags" />
            </div>
            @else
            <div class="column is-3 is-narrow">
                <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                {{ $tag }}
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <p>Konusu hakkında yazılan yazılarımız gösterilmektedir.</p>
                                <a class="is-link" href="{{ route('article.index') }}">Diğer Kategoriler</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
    <!-- end of main page content -->
    @endsection