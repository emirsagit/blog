@extends('layouts.app')

@section('head')
<title>{{ $setting->homeSeoTitle }}</title>
<meta name="description" content="{{ $setting->homeSeoDescription }}">
@endsection

@section('content')
<style>
    .icon:hover {
        fill: black;
    }
</style>
<x-title-partial :title="$setting->homeTitle" :subtitle="$setting->homeSubtitle"/>

<!-- this is the main page content -->
<div class="main-content">
    <div class="container">
        <div class="columns is-centered">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-8 is-mobile">
                @forelse($articles as $article)
                <div class="post-wrapper">
                    <div class="box">
                        <div class="post-header has-text-centered">
                            <img src="{{ $article->thumbnail }}" loading="lazy" alt="{{ $article->title }}">
                            <h4 class="title is-4"><a
                                    href="{{ route('article.show', compact('article')) }}">{{ $article->title }}</a>
                            </h4>
                        </div>
                        
                        <hr />
                        <div class="post-content-short">
                            @if ($article->subtitle)
                            <p>{{$article->subtitle}}</p>
                            @else
                            <p>{{ Str::limit($article->body, 200) }}</p>
                            @endif
                            <div class="continue-reading has-text-centered">
                                <a class="button is-primary is-outlined"
                                    href="{{ route('article.show', compact('article')) }}">Okumaya
                                    devam edin</a>
                            </div>
                            <i><a href="{{ route('article.index', ['user' => $article->author]) }}">#{{ $article->author->name }}</a></i>
                            <div class="post-content-details">
                                <div class="is-pulled-left">
                                    <i>{{ $article->created_at->diffForHumans() }}</i>
                                </div>
                                <div class="is-pulled-right">
                                    @foreach ($article->tags as $tag)
                                    <a href="{{ route('article.index', compact('tag')) }}">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                <div class="post-wrapper">
                    <div class="box">
                        <div class="post-header has-text-centered">
                            Henüz makale bulunmamaktadır.
                        </div>
                    </div>
                </div>
                @endforelse
                <!-- posts should end here -->

                <!-- pagination under posts -->
                <div class="section">
                    <nav class="pagination is-medium is-centered">
                        {{$articles->links()}}
                    </nav>
                </div>
                <!-- end of pagination -->
            </div>
            <!-- end of posts column -->

            <!-- sidebar with plugins/details/etc -->
            <div class="column is-4 is-narrow is-mobile">
                @isset($setting->about)
                <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                {{ $setting->aboutTitle }}
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                {{ $setting->about }}
                            </div>
                        </div>
                    </div>
                </div>
                @endisset

                <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                Kurucularımız
                            </p>
                        </header>
                        @forelse ($admins as $admin)
                        <x-author-partial :author="$admin"/>
                        <hr>
                        @empty
                        Yönetici bulamadık...
                        @endforelse
                    </div>
                </div>

                <x-category-partial :tags="$tags"/>

            </div>
        </div>
    </div>
</div>
<!-- end of main page content -->
@endsection