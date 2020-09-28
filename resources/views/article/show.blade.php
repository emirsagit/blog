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
        <div class="columns is-multiline is-centered">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-8">
                <div class="box">
                    <div class="has-text-centered">
                        <div class="post-header">
                            <img src="{{ $article->thumbnail }}" loading="lazy" alt="{{ $article->title }}">
                            <h4 class="title is-4 is-spaced">{{ $article->title }}</h4>
                            @if($article->subtitle)<h5 class="subtitle is-5"><i>{{ $article->subtitle }}</i></h5>@endif
                            <hr />
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <p>{{ $article->body }}</p>
                    </div>
                    <div class="end-post-details">
                        <div class="is-pulled-left">
                            <i>{{ $article->updated_at->diffForHumans() }}<a class="pl-4" href="{{ route('article.index', ['user' => $article->author]) }}">{{ $article->author->name }}</a></i>
                        </div>
                        <div class="is-pulled-right">
                            @foreach ($article->tags as $tag)
                            <a href="{{ route('article.index', ['tag' => $tag]) }}">#{{ $tag->name }}</a> 
                            @endforeach
                        </div>
                    </div>
                    <hr />
                    <div class="end-content-nav-wrapper">
                        <div class="is-pulled-left">
                            <a href="{{ route('article.index', ['author' => $article->author->name ]) }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"> Yazarın Yüm Yazıları</i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- post should end here -->
         
                <!-- comments section -->
                <x-comments-partial :article="$article" :comments="$comments"/>
                <!-- comments should end here --> 

            </div>
            <!-- end of post column -->

            <!-- sidebar with plugins/details/etc -->
            <div class="column is-4 is-narrow">
                <div class="card-wrapper">
                    <div class="card">
                        <x-author-partial :author="$article->author"/>
                    </div>
                </div>

                <x-category-partial />
            </div>
        </div>
    </div>
</div>
<!-- end of main page content -->


@endsection