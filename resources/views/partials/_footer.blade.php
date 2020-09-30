<footer class="footer has-background-grey-dark">
  <div class="content has-text-centered has-text-white">
    <div class="columns">
      <div class="column">
        @isset($setting->about)
        <h6 class="has-text-white">{{ $setting->aboutTitle }}</h6>
        <p class="has-text-center">{{ $setting->about }}
        </p>
        @endisset
      </div>
      <div class="column">
        <h6 class="has-text-white">İletişim</h6>
         <div class="navbar-brand" style="justify-content: center"> 
          <x-social-media-partial />
          </div>
        @isset ($setting->tel)
        <p>
          Tel: <a href="tel:{{ $setting->tel }}">{{ $setting->tel }}</a>
        </p>
        @endisset
        @isset ($setting->email)
        <p>
          Mail: <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
        </p>
        @endisset
      </div>
      <div class="column">
        <h6 class="has-text-white">Bültenimize Abone Olun</h6>
        <div class="control">
          <input class="input is-large is-rounded" type="text" placeholder="Mail Adresiniz">
        </div>
        <div class="control mt-4">
          <button class="button is-primary is-rounded" type="submit">Kaydet</button>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="has-background-black-ter has-text-white bottom">
  <div class="container is-fluid">
    <div class="columns">
      <div class="column">
        <p>Created By: <a href="mailto:emirsagit@gmail.com">Emir Sağıt</a></p>
      </div>
    </div>
  </div>
</div>