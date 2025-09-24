@props(['variant' => 'primary'])

@php
    $classes = [
        'primary' => 'bg-primary text-white hover:bg-blue-700',
        'secondary' => 'bg-secondary text-white hover:bg-purple-700',
        'outline' => 'border border-primary text-primary hover:bg-primary hover:text-white',
    ][$variant];
@endphp

<button {{ $attributes->merge(['class' => "px-4 py-2 rounded-lg font-medium transition duration-200 {$classes}"]) }}>
    {{ $slot }}
</button>