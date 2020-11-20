<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="mb-10">
        <section class="px-8 py-4 mb-4">
            <header class="container mx-auto">
                <h1>
                    <a href="@auth {{ route('tweets.index') }} @else {{ route('welcome') }} @endauth"><img src="/img/logo.svg" alt="Tweety"></a>
                </h1>
            </header>
        </section>

        {{ $slot }}
    </div>
    <script src="https://www.unpkg.com/turbolinks"></script>
</body>

</html>