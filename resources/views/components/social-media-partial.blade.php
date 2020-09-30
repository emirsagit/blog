@isset ($setting->whatsapp)
<a class="navbar-item is-tab" href="https://wa.me/{{ $setting->whatsapp }}">
    <span class="icon">
        <img src="/img/whatsapp.svg" alt="whatsapp" class="image is-18x18">
    </span>
</a>
@endisset
@isset($setting->facebook)
<a class="navbar-item is-tab" href="{{ url($setting->facebook) }}">
    <span class="icon">
        <img src="/img/facebook.svg" alt="facebook" class="image is-18x18">
    </span>
</a>
@endisset
@isset($setting->instagram)
<a class="navbar-item is-tab" href="{{ url($setting->instagram) }}">
    <span class="icon">
        <img src="/img/instagram.svg" alt="instagram" class="image is-18x18">
    </span>
</a>
@endisset
@isset($setting->twitter)
<a class="navbar-item is-tab" href="{{ url($setting->twitter) }}">
    <span class="icon">
        <img src="/img/twitter.svg" alt="twitter" class="image is-18x18">
    </span>
</a>
@endisset
@isset($setting->linkedin)
<a class="navbar-item is-tab" href="{{ url($setting->linkedin) }}">
    <span class="icon">
        <img src="/img/linkedin.svg" alt="linkedin" class="image is-18x18">
    </span>
</a>
@endisset
@isset($setting->github)
<a class="navbar-item is-tab" href="{{ url($setting->github) }}">
    <span class="icon">
        <img src="/img/github.svg" alt="github" class="image is-18x18">
    </span>
</a>
@endisset