@extends('layouts.app')

@section('content')

<!-- this is the main page content -->
<div class="main-content mt-4">
    <div class="container">
        <div class="columns is-multiline is-centered">
            <!-- posts (image length should be 400; height can be whatever) -->
            <div class="column is-8">
                <form action="{{ route('article.update', compact('article')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="box">
                    <div class="field">
                        <label class="label">Başlık</label>
                        <div class="control">
                            <input 
                            class="input @error('title') is-danger @enderror" 
                            type="text" 
                            placeholder="Başlık" 
                            name="title"                
                            value="{{ $article->title }}">
                        </div>
                        @error('title')<p class="has-text-danger">{{ $errors->first('title') }}</p>@enderror
                    </div>

                    <div class="field">
                        <label class="label">Alt Başlık</label>
                        <div class="control">
                            <textarea 
                            class="textarea @error('subtitle') is-danger @enderror" 
                            placeholder="Alt Başlık" 
                            name="subtitle">
                            {{ $article->subtitle }}
                        </textarea>
                        </div>
                        @error('subtitle')<p class="has-text-danger">{{ $errors->first('subtitle') }}</p>@enderror
                    </div>

                    <div class="field">
                        <label class="label">İçerik</label>
                        <div class="control">
                            <textarea 
                            class="textarea @error('body') is-danger @enderror" 
                            placeholder="İçerik" 
                            name="body" 
                            rows="10">
                            {{ $article->body }}
                        </textarea>
                        </div>
                        @error('body')<p class="has-text-danger">{{ $errors->first('body') }}</p>@enderror
                    </div>

                    <div class="field">
                        <div class="file is-success is-light has-name">
                            <label class="file-label @error('thumbnail') is-danger @enderror">
                                <input 
                                class="file-input" 
                                type="file" 
                                name="thumbnail" 
                                value="{{ $article->thumbnail }}">
                                <span 
                                class="file-cta">
                                    <span 
                                    class="file-label">
                                    Fotoğraf Seçiniz
                                    </span>
                                </span>
                                <span class="file-name">
                                    Foto Eklenmedi
                                </span>
                            </label>
                            @error('thumbnail')<p class="has-text-danger">{{ $errors->first('thumbnail') }}</p>@enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <input 
                            class="input @error('description') is-danger @enderror" 
                            type="text" 
                            placeholder="Description" 
                            name="description" 
                            value="{{ $article->description }}">
                        </div>
                        @error('description')<p class="has-text-danger">{{ $errors->first('description') }}</p>@enderror
                    </div>

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