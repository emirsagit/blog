@extends('../admin/layouts/app')

@section('content')

<x-admin-header />

<section class="section is-main-section">
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Yöneticiler (İsme Göre Sıralı)
            </p>
            <p class="card-header-icon" aria-label="more options">
                Toplam Yönetici: {{ count($admins) }}
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
                                <th>Yetkisi</th>
                                <th class="is-pulled-right">Düzenle / Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($admins as $admin)
                            <tr>
                                <td data-label="Name">{{ $admin->name }}</td>
                                <td data-label="Company">{{ $admin->email }}</td>
                                <td data-label="City">{{ $admin->created_at->diffForHumans() }} </td>
                                <td data-label="City">{{ $admin->role->label }} </td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary"
                                            href="{{ route('admin.show', ['admin' => $admin]) }}" type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                        <form action="{{ route('admin.destroy', ['admin' => $admin] ) }}" method="POST">
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
                                    {{$admins->links()}}
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