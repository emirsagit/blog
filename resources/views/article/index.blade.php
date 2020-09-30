@php
if(isset($tag)) {
$setting->categoryTitle = $tag->name;
$setting->categorySubtitle = "konusundaki içerikleri görüntülüyorsunuz.";
$setting->categorySeoTitle = $tag->name . " konusunda yeni bilgiler";
$setting->categorySeoDescription = $tag->name . " konusunda kalema alınan güncel ve şaşırtıcı bilgiler için tıklayın.";
}elseif (isset($user)) {
$setting->categoryTitle = $user->name;
$setting->categorySubtitle = "tarafından kaleme alınan içerikleri görüntülüyorsunuz.";
$setting->categorySeoTitle = $user->name . " tarafından yazılan yazılar";
$setting->categorySeoDescription = $user->name . " tarafından kaleme alınan güncel ve şaşırtıcı bilgiler için
tıklayın.";
}
@endphp
@extends('layouts.app')
@section('head')
<title>{{ $setting->categorySeoTitle }}</title>
<meta name="description" content="{{ $setting->categorySeoDescription }}">
@endsection
@section('content')
<x-title-partial :title="$setting->categoryTitle" :subtitle="$setting->categorySubtitle" />

<!-- this is the main page content -->
<div class="main-content">
    <div class="container">
        <div class="columns">
            <div class="column is-3 is-narrow">
                <x-category-partial :tags="$tags" />
            </div>
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-9">
                <div class="columns is-multiline">
                    @forelse ($articles as $article)
                    <div class="column is-6">
                        <div class="box">
                            <div class="has-text-centered">
                                <div class="post-header">
                                    <a href="{{ route('article.show', compact('article')) }}">
                                        @if ($article->thumbnail)
                                        <img src="{{ $article->thumbnail }}" alt="{{$article->name}}" loading="lazy">
                                        @endif
                                        <h4 class="is-size-4 is-hoverable">{{ $article->title }}</h4s>
                                    </a>
                                </div>
                            </div>
                            <div class="end-post-details">
                                <div class="is-pulled-left">
                                    <i>{{ $article->updated_at->diffForHumans() }}</i>
                                </div>
                                <div class="is-pulled-right">
                                    <a
                                        href="{{ route('user.show', ['user' => $article->author]) }}">{{ $article->author->name }}</a>
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
        </div>
    </div>
    <!-- end of main page content -->
    @endsection