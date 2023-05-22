<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="">
    <div class="container py-4 px-3 mx-auto">
        <header class="d-flex justify-content-between align-items-md-center pb-3 mb-5 border-bottom">
            <h1 class="h4">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="https://static.apiary.io/assets/1lqsC4I4.png" alt="">
                </a>
            </h1>
            <a href="https://github.com/wessRibeiro/pagamento-asaas" target="_blank" rel="noopener">View on GitHub</a>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
