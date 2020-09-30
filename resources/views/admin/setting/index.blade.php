@extends('../admin/layouts/app')

@section('content')

<x-admin-header />

<section class="section is-main-section">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Form
            </p>
        </header>
        <div class="card-content">
            <form method="POST" action="{{ route('setting.update', ['setting' => $setting]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Hakkımızda</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <textarea class="textarea @error('about') is-danger @enderror" name="about"
                                    rows="10">{{ $setting->about }}</textarea>
                            </p>
                        </div>
                        @error('about') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Profil Fotoğrafı</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="file has-name is-primary">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="logo">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Foto Ekleyin
                                        </span>
                                    </span>
                                    <span class="file-name">
                                        {{ $setting->logo }}
                                    </span>
                                    <figure class="image is-128x128">
                                        <img class="is-rounded" src="{{ $setting->logo }}" id="image">
                                    </figure>
                                </label>
                                @error('logo')<p class="has-text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Telefon</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('tel') is-danger @enderror" name="tel" type="tel"
                                    value="{{ $setting->tel }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('tel') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">E-Posta</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left has-icons-right">
                                <input class="input @error('email') is-danger @enderror" type="email" name="email"
                                    value="{{ $setting->email }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                            </p>
                        </div>
                        @error('email') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Whatsapp</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('whatsapp') is-danger @enderror" name="whatsapp" type="text"
                                    value="{{ $setting->whatsapp }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('whatsapp') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Facebook Adresi</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('facebook') is-danger @enderror" name="facebook" type="text"
                                    value="{{ $setting->facebook }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('facebook') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Instagram Adresi</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('instagram') is-danger @enderror" name="instagram"
                                    type="text" value="{{ $setting->instagram }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('instagram') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Linkedin</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('linkedin') is-danger @enderror" name="linkedin" type="text"
                                    value="{{ $setting->linkedin }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('linkedin') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Twitter</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('twitter') is-danger @enderror" name="twitter" type="text"
                                    value="{{ $setting->twitter }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('twitter') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Github</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('github') is-danger @enderror" name="github" type="text"
                                    value="{{ $setting->github }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('github') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr>

                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Sayfa Başlıkları (Sadece aşağıdaki başlıkları ayarlamalısınız. Diğer sayfa başlıkları makale ya
                        da yazar ismine göre dinamik olarak güncellenir.)
                    </p>
                </header>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Anasayfa Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('homeTitle') is-danger @enderror" name="homeTitle"
                                    type="text" value="{{ $setting->homeTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('homeTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Anasayfa Alt Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('homeSubtitle') is-danger @enderror" name="homeSubtitle"
                                    type="text" value="{{ $setting->homeSubtitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('homeSubtitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">İletişim Sayfası Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('contactTitle') is-danger @enderror" name="contactTitle"
                                    type="text" value="{{ $setting->contactTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('contactTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">İletişim Sayfası Alt Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('contactSubtitle') is-danger @enderror"
                                    name="contactSubtitle" type="text" value="{{ $setting->contactSubtitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('contactSubtitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Yazar Sayfası Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('authorTitle') is-danger @enderror" name="authorTitle"
                                    type="text" value="{{ $setting->authorTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('authorTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Yazar Sayfası Alt Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('authorSubtitle') is-danger @enderror" name="authorSubtitle"
                                    type="text" value="{{ $setting->authorSubtitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('authorSubtitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Kategori Sayfası Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('categoryTitle') is-danger @enderror" name="categoryTitle"
                                    type="text" value="{{ $setting->categoryTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('categoryTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Kategori Sayfası Alt Başlık</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('categorySubtitle') is-danger @enderror"
                                    name="categorySubtitle" type="text" value="{{ $setting->categorySubtitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('categorySubtitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr>

                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Sayfa Seo Ayarları (Sadece aşağıdaki yer alan sayfaları ayarlamalısınız. Diğer sayfa seo
                        ayarları makale ya
                        da yazar ismine göre dinamik olarak güncellenir.)
                    </p>
                </header>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Anasayfa Title</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('homeSeoTitle') is-danger @enderror" name="homeSeoTitle"
                                    type="text" value="{{ $setting->homeSeoTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('homeSeoTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Anasayfa Description</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('homeSeoDescription') is-danger @enderror"
                                    name="homeSeoDescription" type="text" value="{{ $setting->homeSeoDescription }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('homeSeoDescription') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">İletişim Sayfası Title</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('contactSeoTitle') is-danger @enderror"
                                    name="contactSeoTitle" type="text" value="{{ $setting->contactSeoTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('contactSeoTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">İletişim Sayfası Description</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('contactSeoDescription') is-danger @enderror"
                                    name="contactSeoDescription" type="text"
                                    value="{{ $setting->contactSeoDescription }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('contactSeoDescription') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Yazar Sayfası Title</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('authorSeoTitle') is-danger @enderror" name="authorSeoTitle"
                                    type="text" value="{{ $setting->authorSeoTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('authorSeoTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Yazar Sayfası Description</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('authorSeoDescription') is-danger @enderror"
                                    name="authorSeoDescription" type="text"
                                    value="{{ $setting->authorSeoDescription }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('authorSeoDescription') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Kategori Sayfası Title</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('categorySeoTitle') is-danger @enderror"
                                    name="categorySeoTitle" type="text" value="{{ $setting->categorySeoTitle }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('categorySeoTitle') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Kategori Sayfası Description</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('categorySeoDescription') is-danger @enderror"
                                    name="categorySeoDescription" type="text"
                                    value="{{ $setting->categorySeoDescription }}">
                                <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                            </p>
                        </div>
                        @error('categorySeoDescription') <span class="has-text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr>
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-primary">
                                        <span>Kaydet</span>
                                    </button>
                                </div>
                                <div class="control">
                                    <a href="{{ url()->previous() }}" class="button is-primary is-outlined">
                                        <span>Geri</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
  // 1. Display file name when select file
  let fileInput = document.querySelector('.file.has-name')
    let input = fileInput.querySelector('.file-input')
    let name = fileInput.querySelector('.file-name')
    let image = fileInput.querySelector('.is-rounded')
    input.addEventListener('change', () => {
      let files = input.files
      if (files.length === 0) {
        name.innerText = 'No file selected'
      } else {
        name.innerText = files[0].name
        image.src = URL.createObjectURL(files[0]);
      }
    })
})
</script>
@endsection