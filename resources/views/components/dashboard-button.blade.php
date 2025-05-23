@props(['href', 'active' => false])

@php
    $activeClass = $active ? 'bg-blue-700 text-white' : '';
@endphp

<li {{ $attributes->merge(['class' => "py-2 cursor-pointer $activeClass hover:bg-blue-700 color-transitions duration-75 rounded-xl w-full px-4 font-bold text-lg"]) }}>
    <a href="{{$href}}" class="w-full h-full rounded-xl text-white/60">{{$slot}}</a>
</li>