<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased h-full bg-zinc-950">
    <div class="min-h-screen h-full flex flex-col bg-zinc-950">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-zinc-900 border-b border-zinc-800/50 mb-4">
            <div class="px-6 py-5 flex items-center justify-between gap-4">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            <div class="flex-1 overflow-y-auto bg-zinc-950 px-8 py-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
<x-footer />

</html>