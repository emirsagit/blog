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
                        class="button is-primary is-light mb-2 mr-2 is-small">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>