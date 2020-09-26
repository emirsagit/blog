@extends('../admin/layouts/app')

@section('content')

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
<section class="section is-main-section">
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Taglar
            </p>
            <p class="card-header-icon" aria-label="more options">
               <a class="button is-info" href="{{ route('tag.create') }}">Tag Oluştur</a>
            </p>
        </header>
        <div class="card-content">
            <div class="b-table has-pagination">
                <div class="table-wrapper has-mobile-cards">
                    <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>İsim</th>
                                <th>Hakkında Yazılan Makale Sayısı</th>
                                <th>Oluşturulma Tarihi</th>
                                <th class="is-pulled-right">Düzenle / Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $tag)
                            <tr>
                                <td data-label="Name">{{ $tag->name }}</td>
                                <td data-label="Company">{{ count($tag->articles) }}</td>
                                <td data-label="City">{{ $tag->created_at->diffForHumans() }} </td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary"
                                            href="{{ route('tag.show', ['tag' => $tag]) }}" type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                        <form action="{{ route('tag.destroy', ['tag' => $tag] ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button is-small is-danger jb-modal" type="submit">
                                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p class="is-size-5 ml-2 has-text-danger">Tag bulunmamaktadır.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="notification">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <div class="buttons has-addons">
                                    {{ $tags->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection