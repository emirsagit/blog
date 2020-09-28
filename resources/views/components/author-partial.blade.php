<div class="box">
    <article class="media">
        @if ($author->thumbnail)
        <div class="media-left">
            <figure class="image is-128x128">
                <img class="is-rounded" src="{{ $author->thumbnail }}" alt="{{ $author->name }}">
            </figure>
        </div>
        @endif
        <div class="content">
            <h3 is-title is-3>{{ $author->name }}</h3>
            <div class="columns is-mobile">
                @if($author->facebook)
                <a class="navbar-item is-tab">
                    <span class="icon">
                        <img src="/img/facebook.svg" alt="facebook" class="image is-24x24">
                    </span>
                </a>
                @endif
                @if($author->instagram)
                <a class="navbar-item is-tab">
                    <span class="icon">
                        <img src="/img/instagram.svg" alt="instagram" class="image is-24x24">
                    </span>
                </a>
                @endif
                @if($author->twitter)
                <a class="navbar-item is-tab">
                    <span class="icon">
                        <img src="/img/twitter.svg" alt="twitter" class="image is-24x24">
                    </span>
                </a>
                @endif
                @if($author->linkedin)
                <a class="navbar-item is-tab">
                    <span class="icon">
                        <img src="/img/linkedin.svg" alt="linkedin" class="image is-24x24">
                    </span>
                </a>
                @endif
                @if($author->github)
                <a class="navbar-item is-tab">
                    <span class="icon">
                        <img src="/img/github.svg" alt="github" class="image is-24x24">
                    </span>
                </a>
                @endif
            </div>
            <div>
                @if($author->interests)
                <h5>Uzmanlık Alanları: </h5>
                @foreach ($author->interests as $interest)
                <span class="tag is-danger is-light">{{ $interest }}</span>
                @endforeach
                @endif
            </div>
        </div>
    </article>
</div>