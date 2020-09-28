<!-- this is the top navigation -->
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>
    <a class="navbar-item is-tab" href="#">
      <span class="icon">
        <img src="/img/facebook.svg" alt="facebook" class="image is-18x18">
      </span>
    </a>
    <a class="navbar-item is-tab" href="#">
      <span class="icon">
        <img src="/img/instagram.svg" alt="instagram" class="image is-18x18">
      </span>
    </a>
    <a class="navbar-item is-tab" href="#">
      <span class="icon">
        <img src="/img/twitter.svg" alt="twitter" class="image is-18x18">
      </span>
    </a>
    <a class="navbar-item is-tab" href="#">
      <span class="icon">
        <img src="/img/linkedin.svg" alt="linkedin" class="image is-18x18">
      </span>
    </a>
    <a class="navbar-item is-tab" href="#">
      <span class="icon">
        <img src="/img/github.svg" alt="github" class="image is-18x18">
      </span>
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
      data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{ route('index') }}">
        Anasayfa
      </a>
      <a class="navbar-item">
        Hakkımızda
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="{{ route('article.index') }}">
          Kategoriler
        </a>
        <div class="navbar-dropdown">
          @foreach ($tags as $tag)
          <a class="navbar-item" href="{{ route('article.index', compact('tag')) }}">
            {{ $tag->name }}
          </a>
          @endforeach
        </div>
      </div>
      <a class="navbar-item" href="{{ route('contact.index') }}">
        İletişim
      </a>
      <a class="navbar-item" href="{{ route('user.index') }}">
        Yazarlar
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        @guest
        <div class="buttons">
          <a class="button is-primary" href="{{ route('register') }}">
            <strong>Üye Ol</strong>
          </a>
          <a class="button is-light" href="{{ route('login') }}">
            Giriş Yap
          </a>
        </div>
        @endguest
        @auth
        <a class="navbar-item" href="{{ route('contact.index') }}">
          {{ auth()->user()->name }}
        </a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="button is-light" type="submit" name="logout">
            Çıkış
          </button>
        </form>
        @endauth
      </div>
    </div>
  </div>
</nav>

<!-- end of top navigation -->