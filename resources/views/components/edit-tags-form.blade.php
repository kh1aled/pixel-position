@props(['tags'])

@php
    $classes =
        'bg-white/5 space-y-5 border-white/10 border-0 outline-0 text-start px-5 py-2 w-full rounded-xl max-w-xl ';
    $inputClasses = 'bg-transparent 
     focus:outline-2 focus:outline-none focus:outline-none active:outline-none
    border-none focus:border-none foucs:outline-none text-start px-5 py-2 flex-1 rounded-xl max-w-xl ';
@endphp


<div {{ $attributes(['class' => $classes]) }}>
    <h1 class="text-lg">press enter or add hashtag after each tag</h1>
    <div>
        <ul class="flex border p-[7px] rounded-xl flex-wrap " id="edit_tags_box">
            @foreach ($tags as $tag)
                <li
                    class="edit_tag_item mx-[4px] my-[3px] rounded-xl flex justify-between items-center gap-1 bg-white/10 hover:bg-white/25 transition-colors duration-300 px-[1.4rem] py-[0.2rem]">
                    <span data-id="{{$tag->id}}">{{ $tag->name }} </span>
                       <i
                        class="remove_btn ri-close-line text-white h-[20px] w-[20px] cursor-pointer text-sm bg-red-400 flex justify-center items-center rounded-xl"
                        onclick="console.log(1111)"></i>
                </li>
            @endforeach
            <input type="text" name="tags" id="edit_tags_input" placeholder="add a tag"
                {{ $attributes(['class' => $inputClasses]) }}>


        </ul>
    </div>
    <div class="w-full flex justify-between items-center">
        <h1 class="text-sm" id="edit_tags_validation">3 tags are remaining</h1>
        <x-secondary-button id="edit_removeAll_tags">remove all</x-secondary-button>
    </div>
</div>
