@php
    $classes = "bg-black rouded-xl text-start px-5 py-2 w-full rounded-xl max-w-xl "
@endphp

<option type="text" {{$attributes(["class" => $classes])}} >
    {{$slot}}
</option>