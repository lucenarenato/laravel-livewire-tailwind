<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicons/cropped-favicon-e1679770449709-32x32.png" sizes="32x32">
    <link rel="icon" href="/favicons/cropped-favicon-e1679770449709-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/favicons/cropped-favicon-e1679770449709-180x180.png">
    <meta name="msapplication-TileImage" content="/favicons/cropped-favicon-e1679770449709-270x270.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
     <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('aa623c65f70b4c17990d', {
            cluster: 'us2'
        });
    </script>
    @yield('head')
</head>
<body>

    <div class="content">

        <div class="container-fluid">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
