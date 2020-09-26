@extends('../admin/layouts/app')


@section('content')
<!-- this is the main page content -->
<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <ul>
                    <li>Admin</li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="hero is-hero-bar">
    <div class="hero-body">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <h1 class="title">
                        Aşağıdaki bilgilerde değişiklik yapabilirsiniz
                    </h1>
                </div>
            </div>
            <div class="level-right" style="display: none;">
                <div class="level-item"></div>
            </div>
        </div>
    </div>
</section>
<div class="main-content mt-4">
    <div class="container">
        <div class="columns is-multiline is-centered">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-8">
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box">
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                                Makale Oluşturun
                            </p>
                        </header>
                        <hr>
                        <div class="field">
                            <label class="label">Başlık</label>
                            <div class="control">
                                <input class="input @error('title') is-danger @enderror" type="text"
                                    placeholder="Başlık" name="title" value=" {{ old('title') }}">
                            </div>
                            @error('title')<p class="has-text-danger">{{ $errors->first('title') }}</p>@enderror
                        </div>

                        <div class="field">
                            <label class="label">Alt Başlık</label>
                            <div class="control">
                                <textarea class="textarea @error('subtitle') is-danger @enderror"
                                    placeholder="Alt Başlık" name="subtitle">
                                    {{ old('subtitle') }}
                        </textarea>
                            </div>
                            @error('subtitle')<p class="has-text-danger">{{ $errors->first('subtitle') }}</p>@enderror
                        </div>

                        <div class="field">
                            <label class="label">İçerik</label>
                            <div class="control">
                                <textarea class="textarea @error('body') is-danger @enderror" placeholder="İçerik"
                                    name="body" rows="10">
                                    {{ old('body') }}
                        </textarea>
                            </div>
                            @error('body')<p class="has-text-danger">{{ $errors->first('body') }}</p>@enderror
                        </div>

                        <div class="field">
                            <label class="label">Youtube Embed Linki</label>
                            <div class="control">
                                <input class="input @error('video') is-danger @enderror" type="text"
                                    placeholder="Youtube Embed Linki (Kopyalayıp direk yapıştırın)" name="video"
                                    value=" {{ old('video') }}">
                            </div>
                            @error('video')<p class="has-text-danger">{{ $errors->first('video') }}</p>@enderror
                        </div>

                        <div class="field">
                            <div class="file has-name is-primary">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="thumbnail">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Foto Ekleyin
                                        </span>
                                    </span>
                                    <span class="file-name">

                                    </span>
                                    <figure class="image is-128x128">
                                        <img class="is-rounded" src="" id="image">
                                    </figure>
                                </label>
                                @error('thumbnail')<p class="has-text-danger">{{ $errors->first('thumbnail') }}</p>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <label class="label">Etiketler <span class="tag is-light">ctrl'ye basarak istediğiniz kadar
                                    seçebilirsiniz</span></label>
                            <div class="control select is-multiple">
                                <select name="tags[]" multiple size="8" id="tags">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                <button class="button is-primary"
                                    onclick="event.preventDefault(); reset();">Sıfırla</button>
                            </div>
                            @error('tags')<p class="has-text-danger">{{ $errors->first('tags') }}</p>@enderror
                        </div>
                        <hr>
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                                Google Seo Bölümü
                            </p>
                        </header>
                        <hr>

                        <div class="field">
                            <label class="label">Title</label>
                            <div class="control">
                                <input class="input @error('seo_title') is-danger @enderror" type="text"
                                    placeholder="Title" name="seo_title" value="{{ old('seo_title') }}">
                            </div>
                            @error('seo_title')<p class="has-text-danger">{{ $errors->first('seo_title') }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <input class="input @error('description') is-danger @enderror" type="text"
                                    placeholder="Description" name="description" value="{{ old('description') }}"
                                    onkeyup="charcountupdate(this.value)" id="textbox">
                                <span id=charcount></span>
                            </div>
                            @error('description')<p class="has-text-danger">{{ $errors->first('description') }}</p>
                            @enderror
                        </div>
                        <hr>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Kaydet</button>
                            </div>
                            <div class="control">
                                <a class="button is-link is-light" href="{{ url()->previous() }}">Geri</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of main page content -->
@endsection
@section('script')
<script>
    function charcountupdate(str) {
	var lng = str.length;
    document.getElementById("charcount").innerHTML = lng + ' en fazla 160 karakterden';
}
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

  // 2. Remove file name when form reset
  let form = document.getElementsByTagName('form')
    form.addEventListener('reset', () => {
      let name = form.querySelector('.file-name')
        name.innerText = 'No file selected'
    })
})

function reset(e) {
    document.getElementById("tags").value = null;
}

</script>
@endsection