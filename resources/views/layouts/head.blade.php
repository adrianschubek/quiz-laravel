<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

{{--    @includeWhen(request()->route()->named("home"), "layouts.meta")--}}

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"
          data-turbolinks-track="reload">
    <livewire:styles/>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer data-turbolinks-track="reload"></script>
    <livewire:scripts/>

    @stack('head')
</head>
