<section>
    <x-section-head>Profile Information</x-section-head>

    <header>
        <p class="mt-1 text-sm text-gray-300 text-center">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Email Address -->
        <x-form-fields>
            <x-input-label for="name" :value="__('name')" />

            <x-input-form id="name" type="text" name="name" :value="old('name', $user->name)" required autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </x-form-fields>


        <!-- Email Address -->
        <x-form-fields>
            <x-input-label for="email" :value="__('Email')" />
            <x-input-form id="email " type="email" name="email" :value="old('email', $user->email)" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </x-form-fields>

       {{-- avatar img --}}
        <x-form-fields class="justify-center items-center">

            <x-input-label for="tags" :value="__('Avatar Image')" />


            <div
                class="w-full max-w-xl rounded-xl p-10 border border-white border-dashed flex justify-center items-center flex-col">
                <div id="image_upload_from_update" class="mt-3 block">

                    <x-label-button-primary for="avatar_from_update" type="button">
                        Avatar Image
                    </x-label-button-primary>
                </div>

                <div id="image_update_from_update" class="mt-3 hidden justify-center items-center gap-3 flex-col">
                    <img id="image_from_update" src="{{ asset('/storage/images/' . $user->avatar) }}" alt="" class="w-20 h-20 rounded-xl">
                    
                    <div class="flex justify-center items-center gap-3">


                        <x-label-button-primary type="button" for="avatar_from_update" id="avatar_update">
                            update
                        </x-label-button-primary>
                        <x-danger-button type="button" id="delete_image_from_update">Delete</x-danger-button>

                    </div>
                </div>
            </div>
            <input type="file" name="avatar" id="avatar_from_update" value="{{$user->avatar}}" class="hidden">
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </x-form-fields>

        <div class="flex items-center justify-end gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
