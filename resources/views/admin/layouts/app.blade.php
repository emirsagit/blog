<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
    @include('../admin/partials._head')
    @yield('head')
</head>

<body>
    <div id="app">
    @include('../admin/partials._navigation')
    @if ( session('status'))
    @include('../admin/partials._sessionMessage')
    @endif
    @include('../admin/partials._sidebar')
    @yield('content')
    @include('../admin/partials._footer')
    </div>
    @include('../admin/partials._modal')
    @yield('script')
</body>

</html>