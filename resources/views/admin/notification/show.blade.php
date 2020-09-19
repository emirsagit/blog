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
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                {{ $notification->data['name'] }} kişisinden mesaj geldi.
            </p>
        </header>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">Gönderen: {{ $notification->data['name'] }}</p>
                    <p class="subtitle is-6">Mail Adresi: {{ $notification->data['email'] }}</p>
                    <p class="subtitle is-6">Telefonu: {{ $notification->data['tel'] }}</p>
                    <p class="subtitle is-6">Mesajı: {{ $notification->data['body'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection