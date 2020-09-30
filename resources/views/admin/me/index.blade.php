@extends('../admin/layouts/app')

@section('content')

<x-admin-header />

<section class="section is-main-section">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Forms
            </p>
        </header>
        <div class="card-content">
            <form method="POST" action="{{ route('admin.me.update', ['me' => $user]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-update-form :user="$user"/>
        </div>
    </div>
</section>

@endsection