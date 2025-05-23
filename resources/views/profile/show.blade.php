<x-app-layout>
    <div class="border-x-1 border-white/10 w-full py-5 border-top-0 rounded-t-xl">
        {{-- Profile Cover --}}
        <div class="w-full h-[15rem] ">

            <x-animate-image src="{{ asset('storage/images/1740112289.png') }}" div_width="w-full h-full mt-0"
                alt="{{ $employer->name ?? 'Company' }} Logo" />

        </div>

        {{-- Profile Information --}}
        <div class="mt-3 px-3.5">
            {{-- Account Image --}}
            <div class="w-full flex justify-between items-start">
                <img class="inline-block size-24  rounded-full -translate-y-16"
                    src="{{ asset('storage/images/' . auth()->user()->avatar) }}" alt="">
                <x-black-link href="/profile/edit">Edit Profile</x-black-link>
            </div>

            {{-- Profile Details --}}
            <h1 class="text-2xl font-bold capitalize -translate-y-8">{{ auth()->user()->name }}</h1>
        </div>

        {{-- Job Posts --}}

        <nav class="w-full border-b border-white/10 py-2.5 flex justify-center items-center relative">
            <x-nav-link class="cursor-pointer">
                <a href="" class="text-center  relative">
                    Job Posts
                
                    <span class="line_after"></span>
                </a>
            </x-nav-link>

        </nav>
        {{-- posts --}}
        <div class="px-2">
            {{-- post --}}

          


            @if ($jobPosts->isNotEmpty())
            @foreach ($jobPosts as $job)
                
            <x-job-profile-wide :id="$job->id" :title="$job->title" :employer="$job->employer" :salary="$job->salary" :location="$job->location"
                :schedule="$job->schedule" :url="$job->url" :featured="$job->featured" :tags="$job->tags" :avatar="$job->avatar" />
            @endforeach
        @else
            <p class="text-center text-xl mt-6">No recent jobs available.</p>
        @endif

        </div>
    </div>
</x-app-layout>


