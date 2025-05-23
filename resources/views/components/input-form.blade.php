@php
    $classes = "bg-white/5 border-white/10 border text-start px-5 py-2 w-full rounded-xl max-w-xl ";
    $type = "text"
@endphp

<input {{$attributes(["class" => $classes , "type" => $type])}} >