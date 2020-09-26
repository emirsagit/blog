@extends('layouts.app')

@section('content')
<div class="header-content">
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered" style="font-family: 'Rock Salt', cursive;">
                <h1 class="title is-1 is-spaced">
                    Bulma Blog
                </h1>
                <h3 class="subtitle is-3">
                    <i>... or something</i>
                </h3>
            </div>
        </div>
    </section>
</div>

<!-- this is the main page content -->
<div class="main-content">
    <div class="container">
        <div class="columns is-mobile">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-9">
                <div class="columns is-multiline">
                    @forelse ($articles as $article)
                    <div class="column is-6">
                        <div class="box">
                            <div class="has-text-centered">
                                <div class="post-header">
                                    <a href="{{ route('article.show', compact('article')) }}">
                                        <img src="http://placehold.it/900x600">
                                        <h4 class="is-size-4 is-hoverable">{{ $article->title }}</h4s>
                                    </a>
                                </div>
                            </div>
                            <div class="end-post-details">
                                <div class="is-pulled-left">
                                    <i>{{ $article->updated_at }}<a>Author</a></i>
                                </div>
                                <div class="is-pulled-right">
                                    <a>#blog</a> <a>#me</a> <a>#fun</a>
                                </div>
                            </div>
                            <hr />
                            <div class="end-content-nav-wrapper">
                                <div class="is-pulled-left">
                                    <a href="{{ url()->previous() }}">
                                        <i class="fa fa-angle-double-left" aria-hidden="true"> Geri</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- post should end here -->
                    </div>
                    <!-- end of post column -->
                    @empty
                    <p class="has-text-danger">Üzgünüz, aramayla ilgili sonuç bulunamadı...</p>
                    @endforelse
                </div>
            </div>
            @isset($tags)
            <div class="column is-3 is-narrow">
                <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                Kategoriler
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <div class="tags are-medium">
                                    @foreach ($tags as $tag)
                                    <a href="{{ route('article.index', compact('tag')) }}"
                                        class="tag is-link">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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