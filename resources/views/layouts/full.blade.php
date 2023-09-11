<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ nova_get_setting('server_name', config('app.name')) }} - @yield('title')</title>
        <meta name="description" content="{{ nova_get_setting('server_desc', '') }}">
        <link rel="shortcut icon" href="{{ asset(Storage::url(nova_get_setting('server_favicon', ''))) }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- SEO -->
        @include('partials.head-seo')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom settings colors -->
        @if(nova_get_setting('theme_mode') == 'customize')
            @include('partials.appearance-settings')
        @endif

        <!-- Language Switcher Scripts -->
        @include('partials.language-scripts')

        <!-- Inline Styles -->
        @yield('styles')
    </head>
    <body class="font-sans antialiased min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navbar -->
        @include('layouts.navigation')

        <!-- Slider || Breadcrumb -->
        @section('header')
            @include('partials.breadcrumb')
        @show

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Footer -->
        @include('layouts.footer')

        <!-- Inline Scripts -->
        @yield('scripts')
    </body>
</html>
