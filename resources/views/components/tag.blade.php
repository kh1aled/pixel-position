@props(['size' => "base"])

@php
    $classes = "bg-white/10 hover:bg-white/25 transition-colors duration-300 text-x3 rounded-xl px-3 py-1";

    if($size === "base"){

        $classes .= " py-1 px-5 text-xs";
        
    }else if($size ==="small"){
        $classes .= " py-1 px-3 text-sm text-2xs";

    }
@endphp


<div href=""
class="{{$classes}}">{{$slot}}</div>