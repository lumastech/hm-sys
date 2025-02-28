<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Lumastech') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<!-- Link to Font Awesome CSS -->
 <link rel="stylesheet" href="resources/assets/fa/all.min.css">

 <!-- Link to Font Awesome JS -->
 <script src="resources/assets/fa/all.min.js"></script>
        <!-- Scripts -->
        @routes
        @vite([
            'resources/js/app.js',
            "resources/js/Pages/{$page['component'
            ]}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
