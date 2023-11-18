@props(['active' => false, 'icon'])

@php
$classes = ($active ?? false)
            ? 'flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-800 transition-colors duration-200 border-l-4 border-purple-500 dark:text-white'
            : 'flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800';
@endphp


<a  {{ $attributes->merge(['class' => $classes]) }}>
    <span class="text-left">
        {!! $icon !!}
    </span>
    <span class="mx-4 text-sm font-normal">
        {{ $slot }}
    </span>
</a>
