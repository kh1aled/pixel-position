
 @props(['active' => false])

@php
    $classes = ($active ?? false)
        ? 'w-full text-center px-3 py-2 text-sm font-medium text-white bg-white/10 hover:bg-white/10 rounded-sm'
        : 'w-full text-center px-3 py-2 text-sm font-medium hover:text-white hover:bg-white/10 rounded-sm';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}


</a>