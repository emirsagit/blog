<div>
    <input type="hidden" name="user" value="{{ $user->id }}">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">İsim</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left">
                    <input class="input @error('name') is-danger @enderror" name="name" type="text"
                        value="{{ $user->name }}">
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                </p>
            </div>
            @error('name') <span class="has-text-danger">{{ $message }}</span> @enderror
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
                        value="{{ $user->email }}">
                    <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span>
                </p>
            </div>
            @error('email') <span class="has-text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Şifre</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left has-icons-right">
                    <input class="input @error('password') is-danger @enderror" name="password" type="password"
                        placeholder="Şifrenizi değiştirin">
                    <span class="icon is-small is-left"><i class="mdi mdi-pass"></i></span>
                </p>
            </div>
            @error('password') <span class="has-text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <hr>
    @if ($user->id != auth()->user()->id)
    <div class="field has-check is-horizontal">
        <div class="field-label"><label class="label">Yetki</label></div>
        <div class="field-body">
            <div class="field">
                @can('superAdmin')
                <div class="field is-grouped-multiline is-grouped">
                    <div class="control"><label class="b-radio radio"><input type="radio" name="role" value="guest"
                                @if(!$user->role_id) checked @endif>
                            <span class="check"></span>
                            <span class="control-label">Misafir</span>
                        </label>
                    </div>
                    <div class="control"><label class="b-radio radio"><input type="radio" name="role" value="author"
                                @if(isset($user->role) && $user->role->name === 'author')
                            checked
                            @endif>
                            <span class="check"></span>
                            <span class="control-label">Yazar</span>
                        </label>
                    </div>
                    <div class="control"><label class="b-radio radio"><input type="radio" name="role" value="admin"
                                @if(isset($user->role) && $user->role->name === 'admin')
                            checked
                            @endif>
                            <span class="check"></span>
                            <span class="control-label">Editör</span>
                        </label>
                    </div>
                    <div class="control"><label class="b-radio radio"><input type="radio" name="role" value="superAdmin"
                                @if(isset($user->role) && $user->role->name ===
                            'superAdmin') checked
                            @endif>
                            <span class="check"></span>
                            <span class="control-label">Site Sahibi</span>
                        </label>
                    </div>
                </div>
                @else
                <div class="field is-grouped-multiline is-grouped">
                    <div class="control"><label class="b-radio radio"><input type="radio" name="role" value="guest"
                                @if(!$user->role_id) checked @endif>
                            <span class="check"></span>
                            <span class="control-label">Misafir</span>
                        </label>
                    </div>
                    <div class="control"><label class="b-radio radio"><input type="radio" name="role" value="author"
                                @if(isset($user->role) && $user->role->name === 'author')
                            checked
                            @endif>
                            <span class="check"></span>
                            <span class="control-label">Yazar</span>
                        </label>
                    </div>
                </div>
                @endcan
                @error('role') <span class="has-text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    @endif

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Kısa Özgeçmiş</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control is-expanded">
                    <textarea class="textarea @error('about') is-danger @enderror" name="about"
                        rows="10">{{ $user->about }}</textarea>
                </p>
            </div>
            @error('about') <span class="has-text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    @php
    if ($user->interests) {
    $interests = implode(",", $user->interests);
    }
    @endphp"
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Uzmanlık Alanları (aralarına virgül koyarak belirtiniz)</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left">
                    <input class="input @error('interests') is-danger @enderror" name="interests" type="text"
                        value="@if (isset($interests)) {{ $interests }} @endif">
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                </p>
            </div>
            @error('interests') <span class="has-text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Adres</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control is-expanded has-icons-left">
                    <input class="input @error('address') is-danger @enderror" name="address" type="text"
                        value="{{ $user->address }}">
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                </p>
            </div>
            @error('address') <span class="has-text-danger">{{ $message }}</span> @enderror
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
                        value="{{ $user->tel }}">
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                </p>
            </div>
            @error('tel') <span class="has-text-danger">{{ $message }}</span> @enderror
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
                        value="{{ $user->facebook }}">
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
                    <input class="input @error('instagram') is-danger @enderror" name="instagram" type="text"
                        value="{{ $user->instagram }}">
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
                        value="{{ $user->linkedin }}">
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
                        value="{{ $user->twitter }}">
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
                        value="{{ $user->github }}">
                    <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                </p>
            </div>
            @error('github') <span class="has-text-danger">{{ $message }}</span> @enderror
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
                            {{ $user->thumbnail }}
                        </span>
                        <figure class="image is-128x128">
                            <img class="is-rounded" src="{{ $user->thumbnail }}" id="image">
                        </figure>
                    </label>
                    @error('thumbnail')<p class="has-text-danger">{{ $errors->first('thumbnail') }}</p>
                    @enderror
                </div>
            </div>
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
</div>


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