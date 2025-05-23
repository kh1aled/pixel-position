<x-app-layout>
    <x-section-head>Register</x-section-head>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <x-form-fields>
            <x-input-label for="name" :value="__('Name')" />
        
            <x-input-form id="name" name="name" :value="old('name')" required autofocus
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </x-form-fields>

        <!-- Email Address -->
        <x-form-fields>
            <x-input-label for="email" :value="__('Email')" />
            <x-input-form id="email "  type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </x-form-fields>


        <!-- phone number -->
        {{-- <x-form-fields>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-input-form id="phone " type="number" name="phone" :value="old('phone')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </x-form-fields> --}}

        <!-- Password -->
        <x-form-fields>
            <x-input-label for="password" :value="__('Password')" />

            <x-input-form id="password" type="password" name="password" required
                autocomplete="new-password" />
                

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </x-form-fields>

        <!-- Confirm Password -->
        <x-form-fields>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input-form id="password_confirmation" type="password"
                name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </x-form-fields>

         {{-- avatar img --}}
         <x-form-fields class="justify-center items-center">


            <div class="rounded-xl p-10 border border-white border-dashed flex justify-center items-center flex-col">
                <div id="image_upload_from_create" class="mt-3 block">

                    <x-primary-button type="button" for="avatar">
                        <label for="avatar" class="w-full h-full">
                            Avatar Image
                        </label>
                    </x-primary-button>
                </div>

                 <div id="image_update_from_create" class="mt-3 hidden justify-center items-center gap-3 flex-col">
                    <img id="image_from_create" src="" alt=""
                        class="w-20 h-20 rounded-xl">
                    <div class="flex justify-center items-center gap-3"">
                        <x-primary-button type="button">
                            <label for="avatar"  class="w-full h-full">
                                update
                            </label>
                        </x-primary-button>
                        <x-danger-button type="button" id="delete_image_from_create">Delete</x-danger-button>

                    </div>
                </div>
            </div>
            <input type="file" name="avatar" id="avatar">
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </x-form-fields>


        <div class="flex items-center justify-end mt-4 gap-4">
            <a class="underline text-sm text-white-600 hover:text-white/45 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
            
        </div>
    </form>
</x-app-layout>
