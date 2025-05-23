<x-app-layout>
    <x-section-head>Update Job</x-section-head>

    <form class="mb-6" method="POST" action="{{ route('jobs.update', $job->id) }}" id="edit_tag_form" enctype="multipart/form-data"
        onkeydown="if(event.key === 'Enter'){ event.preventDefault(); }">
        @csrf
        @method('PATCH')

        <x-form-fields>
            <x-input-label for="title" :value="__('title')" />

            <x-input-form id="title" type="text" name="title" :value="$job->title" required autofocus
                autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </x-form-fields>

        <!-- salary -->
        <x-form-fields>
            <x-input-label for="salary" :value="__('salary')" />
            <x-input-form id="salary" type="salary" name="salary" :value="$job->salary" required
                autocomplete="salary" />
            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
        </x-form-fields>


        <!-- location -->
        <x-form-fields>
            <x-input-label for="location" :value="__('Location')" />
            <x-input-form id="location " type="string" name="location" :value="$job->location" required
                autocomplete="location" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </x-form-fields>

        <!-- url -->
        <x-form-fields>
            <x-input-label for="url" :value="__('Url')" />

            <x-input-form id="url" type="string" name="url" required autocomplete="url" :value="$job->url" />


            <x-input-error :messages="$errors->get('url')" class="mt-2" />
        </x-form-fields>

        <!-- schedule -->
        <x-form-fields>
            <x-input-label for="schedule" :value="__('Schedule')" />

            <div class="w-full">
                <div class="relative w-full">
                    <x-select-form class="bg-transparent appearance-none cursor-pointer" name="schedule" id="schedule"
                        required autocomplete="schedule">
                        <x-option-form value="Full Time" :selected="$job->schedule == 'Full Time'">Full Time</x-option-form>
                        <x-option-form value="Part Time" :selected="$job->schedule == 'Part Time'">Part Time</x-option-form>
                    </x-select-form>
                </div>
                
            </div>

            <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
        </x-form-fields>



        <!-- tags -->
        <x-form-fields>
            <x-input-label for="tags" :value="__('Tags')" />

            <x-edit-tags-form :tags="$tags"/>

            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
        </x-form-fields>


        {{-- post img --}}
        <x-form-fields class="justify-center items-center">

            <x-input-label for="tags" :value="__('Job Image')" />


            <div
                class="w-full max-w-xl rounded-xl p-10 border border-white border-dashed flex justify-center items-center flex-col">
                <div id="image_upload_from_update" class="mt-3 block">

                    <x-label-button-primary for="avatar_from_update" type="button">
                        Post Image
                    </x-label-button-primary>
                </div>

                <div id="image_update_from_update" class="mt-3 hidden justify-center items-center gap-3 flex-col">
                    <img id="image_from_update" src="{{ asset('/storage/posts/' . $job->avatar) }}" alt="" class="w-20 h-20 rounded-xl">
                    
                    <div class="flex justify-center items-center gap-3">


                        <x-label-button-primary type="button" for="delete_image_from_update" id="avatar_update">
                            update
                        </x-label-button-primary>
                        <x-danger-button type="button" id="delete_image_from_update">Delete</x-danger-button>

                    </div>
                </div>
            </div>
            <input type="file" name="avatar" id="avatar_from_update" value="{{$job->avatar}}" class="hidden">
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </x-form-fields>


        <div class="flex items-center justify-end mt-4 gap-4">


            <x-primary-button>
                {{ __('Update Job') }}
            </x-primary-button>

        </div>
    </form>
</x-app-layout>
