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
    <body class="bg-grey-lighter m-0 p-0">
        <div id="app" class="container mx-auto pt-8">
            <a href="/" class="block max-w-full mb-4 no-underline text-black hover:text-red text-5xl text-center">
                <img src="/images/logo.png" alt="Albert's Avocado Toast Logo">
            </a>

            @yield('body')

            <div class="border-t-2 mt-12 pt-8">
                Not copyright at all because this is a fake company ❤️
            </div>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
