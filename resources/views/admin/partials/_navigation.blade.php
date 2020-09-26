<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
    </a>
  </div>
  <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable">
        <a class="navbar-link is-arrowless">
          <span class="icon"><i class="mdi mdi-menu"></i></span>
          <span>Ana Proje</span>
          <span class="icon">
            <i class="mdi mdi-chevron-down"></i>
          </span>
        </a>
        <div class="navbar-dropdown">
          <a href="{{ route('index') }}" class="navbar-item">
            <span>Ana Sayfa</span>
          </a>
          <a href="{{ route('article.index') }}" class="navbar-item">
            <span>Yazılar</span>
          </a>
          <a href="{{ route('contact.index') }}" class="navbar-item">
            <span>İletişim</span>
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
        <a class="navbar-link is-arrowless">
          <div class="is-user-avatar">
            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe">
          </div>
          <div class="is-user-name"><span>{{ auth()->user()->name }}</span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
          <a href="{{ route('me.index') }}" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>Hesabım</span>
          </a>
          <a  href="{{ route('notification.index') }}" class="navbar-item">
            <span class="icon"><i class="mdi mdi-email"></i></span>
            <span>Bildirimler</span>
          </a>
          <hr class="navbar-divider">
          <form action="{{ route('logout') }}" method="POST" id="my_form">
            @csrf
          </form>
          <a href="javascript:{}" onclick="document.getElementById('my_form').submit()" class="navbar-item">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Çıkış</span>
          </a>
        </div>
      </div>
      @if(isset($unreadNotifications) && $number = count($unreadNotifications) > 0)
      <a href="{{ route('notification.index') }}" class="navbar-item has-divider">
        <img src="/img/bell-ring.svg">
        <span class="tag is-white">{{ $number }}</span>
      </a>
      @endif
      <a href="javascript:{}" onclick="document.getElementById('my_form').submit()" class="navbar-item is-desktop-icon-only">
        <span class="icon"><i class="mdi mdi-logout"></i></span>
        <span>Çıkış</span>
      </a>
    </div>
  </div>
</nav>