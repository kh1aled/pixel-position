@props(['id', 'title', 'employer', 'salary', 'location', 'schedule', 'url', 'featured', 'tags', 'avatar'])

<a id={{ $id }} href="{{ route('jobs.show', $id) }}"
    class="justify-start items-center p-4  gap-6 mt-5 bg-white/5 flex duration-300  rounded-xl text-center border border-transparent transition-colors hover:border-blue-800 cursor-pointer group">


    <x-animate-image src="{{ asset('storage/posts/' . e($avatar)) }}" div_width="w-20" />

    <div class='w-full space-y-2'>
        <div class="flex justify-between items-center">
            <h4 class="text-sm  text-gray-400">{{ $employer->name ?? 'Unknown Employer' }}</h4>
        </div>
        <h1 class="font-bold text-lg text-start group-hover:text-blue-600 duration-300">{{ $title }}</h1>
        <div class="flex justify-between items-center ">
            <h4 class="text-sm text-gray-400">{{ $schedule }} - From {{ $salary }}</h4>
            <div class="flex justify-start items-center gap-2 flex-wrap">

                @foreach ($tags as $tag)
                    <x-tag class="base">{{ $tag->name }}</x-tag>
                @endforeach

            </div>
        </div>
    </div>
</a>

