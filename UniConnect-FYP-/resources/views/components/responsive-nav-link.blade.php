@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-3 text-start text-base font-medium text-primary-600 bg-primary-50 rounded-xl border-l-4 border-primary-500 focus:outline-none focus:bg-primary-100 transition-all duration-300'
            : 'block w-full px-4 py-3 text-start text-base font-medium text-secondary-600 hover:text-primary-600 hover:bg-primary-50 focus:outline-none focus:bg-primary-50 transition-all duration-300 rounded-xl';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
