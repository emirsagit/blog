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
    @if(count($unreadNotifications) > 0)
    <div class="notification is-info">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <div>
                        <span class="icon"><i class="mdi mdi-buffer default"></i></span>
                        <b>Okunmamış bildirimleriniz var</b>
                    </div>
                </div>
            </div>
            <div class="level-right">
                <button type="button" class="button is-small is-white jb-notification-dismiss">Kapat</button>
            </div>
        </div>
    </div>
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Okunmamış Bildirimler
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
                                <th>Kaynak</th>
                                <th>Tarih</th>
                                <th class="is-pulled-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unreadNotifications as $notification)
                            <tr>
                                <td data-label="Name">{{ $notification->data['name'] }}</td>
                                <td data-label="Company">{{ $notification->data['email'] }} </td>
                                <td data-label="Company">{{ $notification->data['status'] }} </td>
                                <td data-label="City">{{ $notification->created_at->diffForHumans() }} </td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary"
                                            href="{{ route('notification.show', [ 'user' => $user, 'notification' => $notification->id ]) }}"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Tüm Bildirimler
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
                                <th>Kaynak</th>
                                <th>Tarih</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($notifications as $notification)
                            <tr>
                                <td data-label="Name">{{ $notification->data['name'] }}</td>
                                <td data-label="Company">{{ $notification->data['email'] }} </td>
                                <td data-label="Company">{{ $notification->data['status'] }} </td>
                                <td data-label="City">{{ $notification->created_at->diffForHumans() }} </td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary"
                                            href="{{ route('notification.show', [ 'user' => $user, 'notification' => $notification->id ]) }}"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
                                        <form
                                            action="{{ route('notification.destroy', [ 'user' => $user, 'notification' => $notification->id ]) }}"
                                            method="POST">
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
                            <p class="is-size-5 ml-2 has-text-danger">Bildirim bulunmamaktadır.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="notification">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <div class="buttons has-addons">
                                    {{$notifications->links()}}
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