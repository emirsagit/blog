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
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="box">
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                                Tag Oluşturun
                            </p>
                        </header>
                        <hr>
                        <div class="field">
                            <label class="label">Tag Adı</label>
                            <div class="control">
                                <input class="input @error('name') is-danger @enderror" type="text"
                                    placeholder="Başlık" name="name" value=" {{ old('name') }}">
                            </div>
                            @error('name')<p class="has-text-danger">{{ $errors->first('name') }}</p>@enderror
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