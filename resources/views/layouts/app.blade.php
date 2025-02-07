<!DOCTYPE html>
<html x-data="$store.darkMode"
    :class="dark === true ? `dark` : ``"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        x-cloak
        x-data="{
            open: false
        }"
        class="font-sans subpixel-antialiased min-h-screen grid grid-cols-1 lg:grid-cols-[300px_1fr] bg-gray-100 dark:bg-gray-900"
    >
        <!-- Sidebar Navigation -->
        <nav class="hidden lg:block bg-stone-50 p-[14px] sticky top-0 h-[100dvh]">
            <x-dash-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <span class="font-bold uppercase">Startr 2025</span>
            </x-dash-link>
            @isset($sidebar)
                {{ $sidebar }}
            @endisset
        </nav>
        <nav
            class="min-h-screen w-[300px] bg-stone-50 dark:bg-gray-800 p-6 fixed top-0 z-50 lg:hidden transition-transform duration-300 transform-gpu ease-out shadow-sm"
            :class="{'-translate-x-[300px]': !open}"
        >
            <div x-show="open" @click.outside="open = false">
                <x-dash-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <span class="font-bold uppercase">Startr 2025</span>
                </x-dash-link>
                @isset($sidebar)
                    {{ $sidebar }}
                @endisset

            </div>
        </nav>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->

            <!-- Page Content -->
            <main>
                <section>
                {{ $slot }}
                </section>
                <x-confirm />
            </main>
        </div>
    </body>
</html>
