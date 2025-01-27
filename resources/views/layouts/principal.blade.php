<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Interoperabilidad') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Roboto" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('apple-touch-icon.png') }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('favicon-32x32.png') }}>
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('favicon-16x16.png') }}>
    <link rel="icon" type="image/x-icon" href={{ asset('favicon.ico') }}>
    <link rel="manifest" href="/site.webmanifest">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column  bg-white">
    @yield('layout')

    <script src="https://kit.fontawesome.com/2af1575d92.js" crossorigin="anonymous"></script>
</body>

</html>
