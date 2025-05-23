<x-app-layout>
    <div class="space-y-10 mt-12">
        <!-- عنوان البحث -->

        <x-search-form/>

        <!-- الوظائف المميزة -->
        <section>
            <x-section-heading>Featured Jobs</x-section-heading>

            @if ($featuredJobs->isNotEmpty())
                <div class="grid lg:grid-cols-3 gap-8">
                    @foreach ($featuredJobs as $job)
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
            @else
                <p class="text-center text-xl mt-6">No featured jobs available.</p>
            @endif
        </section>

        <!-- الوسوم -->
        <section>
            <x-section-heading>Tags</x-section-heading>
            @if ($tags->isNotEmpty())
                <div class="mt-6 flex justify-start items-center gap-2 flex-wrap">
                    @foreach ($tags as $tag)
                        <x-tag>{{ $tag->name }}</x-tag>
                    @endforeach
                </div>
            @else
                <p class="text-center text-xl mt-6">No tags available.</p>
            @endif
        </section>

        <!-- أحدث الوظائف -->
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            @if ($regularJobs->isNotEmpty())
                @foreach ($regularJobs as $job)
                    <x-job-card-wide 
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
            @else
                <p class="text-center text-xl mt-6">No recent jobs available.</p>
            @endif
        </section>

        <!-- قسم إضافي -->
        <section class="mt-5">
            <x-section-heading>Recent Jobs</x-section-heading>
            <x-panel>
                <h5>Hello There</h5>
            </x-panel>
        </section>
    </div>
</x-app-layout>
