<!-- this is the top navigation -->
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>
    <a class="navbar-item is-tab">
      <span class="icon">
        <i class="fa fa-facebook"></i>
      </span>
    </a>
    <a class="navbar-item is-tab">
      <span class="icon">
        <i class="fa fa-twitter"></i>
      </span>
    </a>
    <a class="navbar-item is-tab">
      <span class="icon">
        <i class="fa fa-instagram"></i>
      </span>
    </a>
    <a class="navbar-item is-tab">
      <span class="icon">
        <i class="fa fa-rss"></i>
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
          Yazılar
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item" href="{{ route('contact.index') }}">
            İletişim
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>
      <a class="navbar-item" href="{{ route('contact.index') }}">
        İletişim
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- end of top navigation -->