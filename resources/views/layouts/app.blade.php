<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="has-navbar-fixed-top">
@include("layouts.head")
<body>
@include("layouts.navbar")
<main>
    @yield('content')
</main>
@include("layouts.footer")

@stack('scripts')
</body>
</html>
