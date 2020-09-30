@php
$route = Route::currentRouteName();
$routes = (explode('.' , $route));
@endphp

<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <ul>
                    @foreach ($routes as $route)
                    <li>
                        @php
                        switch ($route) {
                        case 'home':
                        echo "Anasayfa";
                        break;
                        case 'notification':
                        echo "Bildirimler";
                        break;
                        case 'article':
                        echo "Makaleler";
                        break;
                        case 'tag':
                        echo "Kategoriler";
                        break;
                        case 'setting':
                        echo "Site Ayarları";
                        break;
                        case 'admin':
                        echo "Yönetim";
                        break;
                        case 'index':
                        echo "Listele";
                        break;
                        case 'show':
                        echo "Düzenle";
                        break;
                        case 'create':
                        echo "Oluştur";
                        break;
                        case 'user':
                        echo "Üye";
                        break;
                        case 'author':
                        echo "Editör";
                        break;
                        default:
                        echo ucwords($route);
                        break;
                        }
                        @endphp
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="buttons is-right">
                    <a href="https://admin-one-html.justboil.me/" target="_blank" class="button is-primary">
                        <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                        <span>Premium Demo</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>