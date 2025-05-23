@props(['src', 'alt' => 'Company Logo', 'div_width' => 'w-[44px]'])

@php
    $divClasses = "$div_width  aspect-square rounded-xl bg-gray-800 overflow-hidden relative flex-shrink-0 flex justify-center items-center";
    $imageClasses = 'object-cover w-full h-full absolute inset-0';
@endphp

<div {{ $attributes->merge(['class' => $divClasses]) }}>
    <img 
        class="{{ $imageClasses }}"
        src="{{ $src }}"
        alt="{{ $alt }}"
        onerror="this.style.display='none'; this.parentElement.classList.add('animate-pulse'); this.parentElement.innerHTML='<span class=\'text-white text-xs\'>No Image</span>';">
</div>
