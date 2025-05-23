<section>
    <x-section-head>Update Password</x-section-head>

    <header>
        <p class="mt-1 text-sm text-gray-300 text-center">
            {{ __("Ensure your account is using a long, random password to stay secure.") }}
        </p>
    </header>
 

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <x-form-fields>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />

            <x-input-form id="update_password_current_password" type="password" name="current_password" required autocomplete="current-update_password_current_password" />

            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </x-form-fields>

            <!-- Current Password -->

            <x-form-fields>
                <x-input-label for="update_password_password" :value="__('New Password')" />
    
                <x-input-form id="update_password_password" type="password" name="password" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </x-form-fields>


            <x-form-fields>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />

            <x-input-form id="update_password_password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </x-form-fields>



        <div class="flex items-center justify-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
