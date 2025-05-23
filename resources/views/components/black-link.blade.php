
 @props(['active' => false])

@php
    $classes = ($active ?? false)
        ? 'rounded-3xl px-3 py-2 text-sm font-medium text-white bg-gray-700 border-white/10'
        : 'rounded-3xl px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-800 hover:text-white border border-white cursor-pointer';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>