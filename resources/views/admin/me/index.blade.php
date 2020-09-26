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
<section class="section is-main-section">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Forms
            </p>
        </header>
        <div class="card-content">
            <form method="POST" action="{{ route('me.update', ['me' => $user]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-update-form :user="$user"/>
        </div>
    </div>
</section>
@endsection

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