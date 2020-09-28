<div class="box">
    <div class="has-text-centered">
        <div class="post-header">
            @guest
            <p class="title is-4">Yorumlar</p>
            <p class="mb-4">Yorum Yapmak İçin
                <a href="{{ route('register') }}">Üye Olun</a> ya da
                <a href="{{ route('login') }}">Giriş Yapın</a>
            </p>
            @endguest
            <hr />
        </div>
    </div>
    @forelse ($comments as $comment)
    <article class="media">
        <div class="media-content">
            <div class="content">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->body }}</p>
                <small>
                    <p>
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                </small>
                @auth
                <a onclick="event.preventDefault(); childComment({{ $comment->id }}, '{{ $comment->user->name }}')">Yanıtla
                </a>
                @if(auth()->user()->id === $article->user_id || Auth::user()->can('admin') || auth()->user()->id === $comment->user_id)
                <form action="{{ route('comment.destroy', ['comment' => $comment, 'article' => $article]) }}" class="mt-3" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger is-light is-small" type="submit">Sil</button>
                </form>
                @endif
                @endauth
            </div>
            @foreach ($comment->children as $childComment)
            <article class="media ml-4 pl-4">
                <div class="media-content">
                    <div class="content">
                        <strong>{{ $childComment->user->name }}</strong>
                        <p>{{ $childComment->body }}</p>
                        <small>
                            <p>
                                {{ $childComment->created_at->diffForHumans() }}
                            </p>
                        </small>
                        @auth
                        @if(auth()->user()->id === $article->user_id || Auth::user()->can('admin') || auth()->user()->id === $comment->user_id)
                        <form action="{{ route('comment.destroy', ['comment' => $childComment, 'article' => $article]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button is-danger is-light is-small" type="submit">Sil</button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </article>
    @empty
    <article class="media">
        <div class="media-content">
            <div class="content">
                <p> Henüz yorum bulamadık.</p>
            </div>
        </div>
    </article>
    @endforelse
    @guest
    <p class="mt-4 has-text-centered">Yorum Yapmak İçin
        <a href="{{ route('register') }}">Üye Olun</a> ya da
        <a href="{{ route('login') }}">Giriş Yapın</a>
    </p>
    @endguest
    @auth
    <article class="media">
        <div class="media-content">
            <form action="{{ route('comment.store', ['article' => $article]) }}" method="POST" id="form">
                @csrf
                <div class="field">
                    <p class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" placeholder="Yorum Yap"
                            name="body"></textarea>
                    </p>
                </div>
                @error('body')<p class="has-text-danger">{{ $message }}</p>@enderror
                <input type="hidden" value="" name="parent" id="parent">
                <div class="field">
                    <p class="control">
                        <button class="button">Yorum Yaz</button>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-danger is-light" id="commentusername" style="display: none"></span>
                                <a class="tag is-delete" style="display: none" id="tag"
                                    onclick="event.preventDefault();deleteValues()"></a>
                            </div>
                        </div>
                        <p class="has-text-danger" id="commentusername"></p>
                    </p>
                </div>
            </form>
        </div>
    </article>
    @endauth
</div>

<script>
    function childComment(comment_id, commentusername) {
     document.getElementById("parent").value = comment_id;
     var a = document.getElementById("commentusername");
     a.innerHTML = commentusername.concat(" isimli ziyaretçimizin yorumunu yanıtlayabilirsiniz");
     a.style.display ="block";
     document.getElementById("tag").style.display = "block"; 
     var elmnt = document.getElementById("form");
     elmnt.scrollIntoView();
  }
  function deleteValues() {
     document.getElementById("parent").value = null;
     var a = document.getElementById("commentusername");
     a.innerHTML = null;
     a.style.display ="none";
     document.getElementById("tag").style.display = "none"; 
  }
</script>