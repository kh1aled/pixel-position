@props(['value'])


    <x-section-heading>

        <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white w-[8rem]']) }}>
            {{ $value ?? $slot }}
        </label>
    </x-section-heading>
