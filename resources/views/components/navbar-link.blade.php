@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-light text-blue-500'
            : 'font-light text-neutral-500 hover:text-blue-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>