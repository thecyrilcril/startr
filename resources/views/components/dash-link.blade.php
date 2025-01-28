@props([
    'active',
    'type' => 'link' // (link|button)
])

@php
$classes = ($active ?? false)
            ? 'text-stone-500 dark:text-stone-200'
            : '';
@endphp
@if($type === 'link')
<a {{ $attributes->merge(['class' => 'flex gap-2 items-center capitalize dark:text-gray-400 hover:text-stone-700 dark:hover:text-stone-300 duration-150 transition-colors ' . $classes]) }}>
    {{ $slot }}
</a>
@endif
@if($type === 'button')
<button {{ $attributes->twMerge(['class' => 'flex items-center gap-2 capitalize  dark:text-gray-400 hover:pointer hover:text-stone-700 dark:hover:text-stone-300 duration-150 transition-colors ' . $classes]) }}>
    {{ $slot }}
</button>
@endif
