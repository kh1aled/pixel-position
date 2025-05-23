@php
    $classes = "bg-white/5 border-white/10 border text-start px-5 py-2 w-full rounded-xl max-w-xl "
@endphp

<select type="text" {{$attributes(["class" => $classes])}} >
    {{$slot}}
</select>