@props(['title' => 'Boutique Animalière', 'hideNavigation' => false, 'hideFooter' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'APWAP') }} - {{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Additional Head Content -->
    @stack('head')
</head>
<body class="font-sans antialiased bg-beige min-h-screen flex flex-col">
    <!-- Navigation (optionnelle) -->
    @unless($hideNavigation)
        @include('layouts.partials.navigation')
    @endunless

    <!-- Page Content -->
    <main class="@unless($hideNavigation) pt-0 @endunless flex-1">
        {{ $slot }}
    </main>

    <!-- Footer (optionnel) -->
    @unless($hideFooter)
        @include('layouts.partials.footer')
    @endunless

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
