<x-app-layout>
    <div class="space-y-10 mt-12">

        <x-search-form/>

        <section>
            <x-section-heading>Filtered Jobs</x-section-heading>

            @if ($jobs->isEmpty())
                <h1 class="capitalize text-center text-2xl font-bold w-full mt-12">
                    There are no results matching your search.
                </h1>
            @else
                <div class="grid lg:grid-cols-3 gap-8">
                    @foreach ($jobs as $job)
                        <x-job-card 
                            :id="$job->id" 
                            :title="$job->title" 
                            :employer="$job->employer" 
                            :salary="$job->salary"
                            :location="$job->location" 
                            :schedule="$job->schedule" 
                            :url="$job->url" 
                            :featured="$job->featured" 
                            :tags="$job->tags"
                            :avatar="$job->avatar" 
                        />
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
