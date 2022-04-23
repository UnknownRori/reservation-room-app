<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('title') - {{ env('APP_NAME', 'HOTEL MANAGEMENT') }}</title>
    @livewireStyles()
</head>

<body>
    <x-navbar>
        <x-slot name="title">@yield('title')</x-slot>
    </x-navbar>

    <x-msgbar></x-msgbar>

    <main class="min-vh-100">
        @yield('content')
    </main>

    <x-footer>
        <x-slot name="title">@yield('content')</x-slot>
    </x-footer>

    @livewireScripts()
</body>

</html>
