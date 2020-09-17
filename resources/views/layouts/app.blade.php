<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     @include('../partials._head')
</head>

<body>
    @include('../partials._navigation')
    @yield('content')
    @include('../partials._footer')
</body>

</html>