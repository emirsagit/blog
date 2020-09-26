@extends('layouts.app')
@section('content')
<style>
    .icon:hover {
        fill: black;
    }
</style>
<div class="header-content">

    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered" style="font-family: 'Rock Salt', cursive;">
                <h1 class="title is-1 is-spaced">
                    Psikolojik Danışmanlık ve Çocuk Eğitimi
                </h1>
                <h3 class="subtitle is-3">
                    <i>Merhabalar...</i>
                </h3>
            </div>
        </div>
    </section>
</div>

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
                            <img src="{{ $article->thumbnail }}">
                            <h4 class="title is-4"><a
                                    href="{{ route('article.show', compact('article')) }}">{{ $article->title }}</a>
                            </h4>
                        </div>
                        <hr />
                        <div class="post-content-short">
                            @if ($article->subtitle)
                            <p>{{$article->subtitle}}</p>
                            @else
                            <p>{{ Str::limit($article->body, 100) }}</p>
                            @endif
                            <div class="continue-reading has-text-centered">
                                <a class="button is-primary is-outlined"
                                    href="{{ route('article.show', compact('article')) }}">Okumaya
                                    devam edin</a>
                            </div>
                            <div class="post-content-details">
                                <div class="is-pulled-left">
                                    <i>{{ $article->created_at->diffForHumans() }}
                                        <a href="#">#{{ $article->author->name }}</a>
                                    </i>
                                </div>
                                <div class="is-pulled-right">
                                    @foreach ($article->tags as $tag)
                                    <a>#{{ $tag->name }}</a>
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
                <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                Hakkımızda
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                Amacımız sizlerin sorunlarını modern psikolojik yöntemlerden yararlanarak bir nebze de
                                olsun hafifletmek, danışanlarımıza yaşadıkları benzer olaylar hakkında kendilerinin
                                yalnız olmadığını hissettirerek çözümler sunmaktır.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                Kurucularımız
                            </p>
                        </header>
                        @forelse ($admins as $admin)
                        @if ($admin->thumbnail)
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img class="is-rounded" src="{{ $admin->thumbnail }}" alt="{{ $admin->name }}">
                            </figure>
                        </div>
                        @endif

                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">{{ $admin->name }}</p>
                                    <div class="columns is-mobile">
                                        @if($admin->facebook)
                                        <a class="navbar-item is-tab">
                                            <span class="icon">
                                                <img src="/img/facebook.svg" alt="facebook" class="image is-24x24">             
                                            </span>
                                        </a>
                                        @endif
                                        @if($admin->instagram)
                                        <a class="navbar-item is-tab">
                                            <span class="icon">
                                                <img src="/img/instagram.svg" alt="instagram" class="image is-24x24">             
                                            </span>
                                        </a>
                                        @endif
                                        @if($admin->twitter)
                                        <a class="navbar-item is-tab">
                                            <span class="icon">
                                                <img src="/img/twitter.svg" alt="twitter" class="image is-24x24">             
                                            </span>
                                        </a>
                                        @endif
                                        @if($admin->linkedin)
                                        <a class="navbar-item is-tab">
                                            <span class="icon">
                                                <img src="/img/linkedin.svg" alt="linkedin" class="image is-24x24">             
                                            </span>
                                        </a>
                                        @endif
                                        @if($admin->github)
                                        <a class="navbar-item is-tab">
                                            <span class="icon">
                                                <img src="/img/github.svg" alt="github" class="image is-24x24">             
                                            </span>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="content">
                                <p>{{ $admin->about }}</p>
                                @if($admin->interests)
                                <h5>Uzmanlık Alanları: </h5>
                                @foreach ($admin->interests as $interest)
                                <span class="tag is-danger is-light">{{ $interest }}</span>
                                @endforeach

                                @endif
                            </div>
                        </div>
                        <hr>
                        @empty
                        Yönetici bulamadık...
                        @endforelse
                    </div>
                </div>

                {{-- <div class="card-wrapper">
                    <div class="card">
                        <header class="card-header-fix-center has-text-centered">
                            <p class="card-header-title-fix">
                                Something
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis
                                mauris.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis
                                mauris.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis
                                mauris.
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end of plugins/etc/ column -->

            </div>
        </div>
    </div>
</div>
<!-- end of main page content -->
@endsection