<!-- this is the top navigation -->
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    @isset($setting->logo)
    <a class="navbar-item" href="{{ route('index') }}">
      <img src="{{ $setting->logo }}" alt="logo" class="is-3by1" style="min-height: 3rem">
    </a>
    @endisset
    <x-social-media-partial />

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
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="{{ route('me.index') }}">
            {{ auth()->user()->name }}
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="{{ route('me.index') }}">
              Hesap Bilgilerim
            </a>
          </div>
        </div>
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

<script>
  document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});
</script>