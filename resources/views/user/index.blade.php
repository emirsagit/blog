@extends('layouts.app')

@section('head')
<title>{{ $setting->authorSeoTitle }}</title>
<meta name="description" content="{{ $setting->authorSeoDescription }}">
@endsection

@section('content')

<x-title-partial :title="$setting->authorTitle" :subtitle="$setting->authorSubtitle" />


<!-- this is the main page content -->
<div class="main-content">
    <div class="container">
        <div class="columns">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-9">
                <div class="columns is-multiline">
                    @forelse ($users as $user)
                    <div class="column is-6">
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
                                        <p class="title is-5">{{ $user->name }}</p>
                                        <br>
                                        <a href="{{ route('article.index', compact('user')) }}">Yazarın Tüm Yazıları</a>
                                        <br>
                                        <a href="{{ route('user.show', compact('user')) }}">Yazarın Özgeçmişi</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!-- end of post column -->
                    @empty
                    <p class="has-text-danger">Üzgünüz, aramayla ilgili sonuç bulunamadı...</p>
                    @endforelse
                </div>
            </div>
            @isset($tags)
            <div class="column is-3 is-narrow">
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