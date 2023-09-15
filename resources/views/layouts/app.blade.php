<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ nova_get_setting('server_name', config('app.name', 'Laravel')) }} - @yield('title')</title>
        <meta name="description" content="{{ nova_get_setting('server_desc', '') }}">
        <link rel="shortcut icon" href="{{ asset(Storage::url(nova_get_setting('server_favicon', ''))) }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- SEO -->
        @include('partials.head-seo')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Theme Mode Switcher Scripts -->
        @include('partials.theme-mode-scripts')

        <!-- Custom settings colors -->
        @if(nova_get_setting('theme_mode') == 'customize')
            @include('partials.appearance-settings')
        @endif

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
                    <div class="lg:flex lg:flex-wrap m-4">
                        <div class="md:w-2/3 p-4">
                            @yield('content')
                        </div>

                        <aside class="md:w-1/3 p-4">
                            <div class="space-y-6">
                                @include('partials.sidebar')
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        @include('layouts.footer')

        <!-- Inline Scripts -->
        @yield('scripts')
    </body>
</html>
