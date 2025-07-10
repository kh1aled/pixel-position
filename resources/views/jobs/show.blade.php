<x-app-layout>
    <x-section-head class="mt-16">Job Show</x-section-head>

    <div class="w-lg border border-white/10 rounded-xl p-[1.5rem] mx-auto ">
        <div>
            <div class="flex justify-start items-center gap-1.5">
                <div class="flex -space-x-1 overflow-hidden bg-gray-800 w-12 aspect-square rounded-full">
                    <img class="inline-block w-full aspect-square rounded-full "
                        src="{{ asset('storage/images/' . $employer->logo) }}"
                        onerror="this.parentElement.classList.add('animate-pulse');this.remove();">
                </div>
                <div>
                    <h1 class="text-lg text-gray-300 capitalize font-bold">{{ $employer->name }}</h1>
                    <p class="lowercase text-sm text-gray-400">{{ $job->created_at }}</p>
                </div>
            </div>
            <div class="mt-8 space-y-1">
                <div class="flex justify-start items-center gap-1.5 flex-wrap ">
                    <h1 class="font-bold capitalize ">title :</h1>
                    <p class="lowercase text-sm text-gray-400">{{ $job->title }}</p>
                </div>
                <div class="flex justify-start items-center gap-1.5 flex-wrap">
                    <h1 class="font-bold capitalize ">salary :</h1>
                    <p class="lowercase text-sm text-gray-400">${{ $job->salary }}</p>
                </div>
                <div class="flex justify-start items-center gap-1.5 flex-wrap">
                    <h1 class="font-bold capitalize ">loaction :</h1>
                    <p class="lowercase text-sm text-gray-400">{{ $job->location }}</p>
                </div>
                <div class="flex justify-start items-center gap-1.5 flex-wrap">
                    <h1 class="font-bold capitalize ">schedule :</h1>
                    <p class="lowercase text-sm text-gray-400">{{ $job->schedule }}</p>
                </div>
                <div class="flex justify-start items-center gap-1.5 flex-wrap">
                    <h1 class="font-bold capitalize ">url :</h1>
                    <p class="lowercase text-sm text-gray-400">
                        <a href="{{ $job->url }}">{{ $job->url }}</a>
                    </p>
                </div>
            </div>
        </div>


        <x-animate-image src="{{ asset('storage/posts/' . e($job->avatar)) }}" div_width="w-full h-[32rem] mt-5"
            alt="{{ $employer->name ?? 'Company' }} Logo" />



    </div>

    @can('update-job', $employer)
        <div class="w-full flex justify-end items-center gap-6 mb-4">
            <x-primary-link href="{{ route('jobs.edit', $job->id) }}">Update</x-primary-link>


            <form action="{{ route('jobs.destroy', $job->id) }}" method="post">
                @csrf
                @method('DELETE')

                <x-danger-button>Delete</x-danger-button>

            </form>
        </div>
    @endcan



</x-app-layout>
