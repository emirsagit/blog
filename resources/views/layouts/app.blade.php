<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('../partials._head')
</head>

<body>
    @include('../partials._navigation')
    @if ( session('message'))
    @include('../partials._sessionMessage')
    @endif
    @yield('content')
    @include('../partials._footer')
</body>

</html>