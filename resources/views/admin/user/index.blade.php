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
                Misafir Üyeler (İsme Göre Sıralı)
            </p>
            <p class="card-header-icon" aria-label="more options">
               Toplam Kullanıcı: {{ count($users) }}
            </p>
        </header>
        <div class="card-content">
            <div class="b-table has-pagination">
                <div class="table-wrapper has-mobile-cards">
                    <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>İsim</th>
                                <th>Mail Adresi</th>
                                <th>Üyelik Tarihi</th>
                                <th class="is-pulled-right">Düzenle / Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td data-label="Name">{{ $user->name }}</td>
                                <td data-label="Company">{{ $user->email }}</td>
                                <td data-label="City">{{ $user->created_at->diffForHumans() }} </td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary"
                                            href="{{ route('user.show', ['user' => $user]) }}" type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                        <form action="{{ route('user.destroy', ['user' => $user] ) }}" method="POST">
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
                            <p class="is-size-5 ml-2 has-text-danger">Kullanıcı bulunmamaktadır.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="notification">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <div class="buttons has-addons">
                                    {{$users->links()}}
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