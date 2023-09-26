@props(['navbg' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Dots Bg -->
        <style>
            .dark\:bg-dots-lighter{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg width='30' height='30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.227 0c.687 0 1.227.54 1.227 1.227s-.54 1.227-1.227 1.227S0 1.914 0 1.227.54 0 1.227 0z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <x-navigation :bg="$navbg"></x-navigation>
        <div {{ $attributes->merge(['class' => 'pt-[64px] relative min-h-screen']) }}>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </body>
</html>
