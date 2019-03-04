<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Albert's Avocado Toast</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

        <script>
            window.AAT = {
                gmapsKey: '{{ config('services.google-maps.api-key') }}',
            };
        </script>
    </head>
    <body>
        <div id="app">
            <a href="/" class="block mb-4 mt-8 no-underline text-black hover:text-red text-5xl text-center">
                Albert's Avocado Toast 🥑🍞
            </a>

            @yield('body')
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
