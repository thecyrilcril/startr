@props([
    'sidebar' => 'layouts._sidebar',
    'page' => 'Dashboard',
])
    <x-slot name="sidebar">
         @include($sidebar)
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($page) }}
        </h2>
    </x-slot>
