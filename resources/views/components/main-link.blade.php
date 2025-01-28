@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'py-2 text-sky-700 hover:text-sky-700 hover:underline transition-colors duration-150 ease-in-out'
            : 'py-2 hover:text-sky-700 hover:underline transition-colors duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} {{ $active === true ? 'aria-current=page' : '' }}>
    {{ $slot }}
</a>
