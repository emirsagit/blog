@php
    $activeRoute = Route::currentRouteName();
@endphp
<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div class="aside-tools-label">
      <p>Created By: <a class="button-hover-color" href="mailto:emirsagit@gmail.com">Emir Sağıt</a></p>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">Genel</p>
    <ul class="menu-list">
      <li>
        <a href="{{ route('admin.home') }}" class="@if($activeRoute === "admin.home") is-active @endif has-icon">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Anasayfa</span>
        </a>
      </li>
      <li>
        <a href="{{ route('notification.index') }}" class="@if($activeRoute === "notification.index" || $activeRoute === "notification.show") is-active @endif has-icon">
          <span class="icon 
            @if(isset($unreadNotifications) && $number = count($unreadNotifications) > 0)
            has-update-mark" @else "has-mark" @endif><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Bildirimler</span>
        </a>
      </li>
      <li class="@if($activeRoute === "admin.article.index" || $activeRoute === "admin.article.create" || $activeRoute === "admin.article.show") is-active @endif">
        <a class="has-icon has-dropdown-icon @if($activeRoute === "admin.article.index" || $activeRoute === "admin.article.create" || $activeRoute === "admin.article.show") is-active @endif">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Makaleler</span>
          <div class="dropdown-icon">
            <span class="icon"><i class="mdi mdi-plus"></i></span>
          </div>
        </a>
        <ul>
          <li>
            <a href="{{ route('admin.article.index') }}" class="@if($activeRoute === "admin.article.index") is-active @endif">
              <span>Listele</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.article.create') }}" class="@if($activeRoute === "admin.article.create") is-active @endif">
              <span>Yeni Makale</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    @can('admin')
    <p class="menu-label">Diğer Sayfalar</p>
    <ul class="menu-list">
      <li>
        <a href="{{ route('admin.user.index') }}" class="has-icon @if($activeRoute === "admin.user.index" || $activeRoute === "admin.user.show") is-active @endif">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Misafir Üyeler</span>
        </a>
      </li>
      <li>
        <a href="{{ route('author.index') }}" class="has-icon @if($activeRoute === "author.index" || $activeRoute === "author.show") is-active @endif">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Yazarlar</span>
        </a>
      </li>
      @endcan
      @can ('superAdmin')
      <li>
        <a href="{{ route('admin.index') }}" class="has-icon @if($activeRoute === "admin.index" || $activeRoute === "admin.show") is-active @endif">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Yöneticiler</span>
        </a>
      </li>
      <li class="@if($activeRoute === "tag.index" || $activeRoute === "tag.create" || $activeRoute === "tag.show") is-active @endif">
        <a class="has-icon has-dropdown-icon @if($activeRoute === "tag.index" || $activeRoute === "tag.create" || $activeRoute === "tag.show") is-active @endif">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Kategoriler</span>
          <div class="dropdown-icon">
            <span class="icon"><i class="mdi mdi-plus"></i></span>
          </div>
        </a>
        <ul>
          <li>
            <a href="{{ route('tag.index') }}" class="@if($activeRoute === "tag.index") is-active @endif">
              <span>Listele</span>
            </a>
          </li>
          <li>
            <a href="{{ route('tag.create') }}" class="@if($activeRoute === "tag.create") is-active @endif">
              <span>Yeni Kategori</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{ route('setting.index') }}" class="has-icon @if($activeRoute === "setting.index") is-active @endif">
          <span class="icon"><i class="mdi mdi-help-circle"></i></span>
          <span class="menu-item-label">Site Ayarları</span>
        </a>
      </li>
    </ul>
    @endcan
    <p class="menu-label">İletişim</p>
    <ul class="menu-list">
      <li>
        <a href="https://wa.me/905511623997" class="has-icon">
          <span class="icon"><i class="mdi mdi-help-circle"></i></span>
          <span class="menu-item-label">Developer Whatsapp</span>
        </a>
      </li>
    </ul>
  </div>
</aside>