<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div class="aside-tools-label">
      <span><b>Admin</b> One HTML</span>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">Genel</p>
    <ul class="menu-list">
      <li>
        <a href="{{ route('admin.home') }}" class="is-active router-link-active has-icon">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Anasayfa</span>
        </a>
      </li>
      <li>
        <a href="{{ route('notification.index') }}" class="has-icon">
          <span class="icon 
            @if(isset($unreadNotifications) && $number = count($unreadNotifications) > 0)
            has-update-mark" @else "has-mark" @endif><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Bildirimler</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.article.index') }}" class="is-active router-link-active has-icon">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Makaleler</span>
        </a>
      </li>
    </ul>
    @can('admin')
    <p class="menu-label">Diğer Sayfalar</p>
    <ul class="menu-list">
      <li>
        <a href="{{ route('admin.user.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Misafir Üyeler</span>
        </a>
      </li>
      <li>
        <a href="{{ route('author.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Yazarlar</span>
        </a>
      </li>
      @can ('superAdmin')
      <li>
        <a href="{{ route('admin.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Yöneticiler</span>
        </a>
      </li>
      <li>
        <a href="{{ route('tag.index') }}" class="has-icon">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Taglar</span>
        </a>
      </li>
    </ul>
    @endcan
    @endcan
    <p class="menu-label">About</p>
    <ul class="menu-list">
      <li>
        <a href="https://admin-one-html.justboil.me/" target="_blank" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span class="menu-item-label">Premium Demo</span>
        </a>
      </li>
      <li>
        <a href="https://justboil.me/bulma-admin-template/one-html" class="has-icon">
          <span class="icon"><i class="mdi mdi-help-circle"></i></span>
          <span class="menu-item-label">About</span>
        </a>
      </li>
    </ul>
  </div>
</aside>