<div class="header-content">
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-2">
                    @isset($title)
                    {{ $title }}
                    @endisset
                </h1>
                <h3 class="is-size-4">
                    @isset($subtitle)
                    <i>{{ $subtitle }}</i>
                    @endisset
                </h3>
            </div>
        </div>
    </section>
</div>