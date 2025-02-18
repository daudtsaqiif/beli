<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Avatar -->

        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" 
                autofocus autocomplete="avatar" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Bank Account -->
        <div>
            <x-input-label for="bank_account" :value="__('Bank_account')" />
            <x-text-input id="bank_account" class="block mt-1 w-full" type="text" name="bank_account"
                :value="old('bank_account')" required autofocus autocomplete="bank_account" />
            <x-input-error :messages="$errors->get('bank_account')" class="mt-2" />
        </div>

        <!-- Bank Name -->
        <div>
            <x-input-label for="bank_name" :value="__('Bank_Name')" />
            <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')"
                required autofocus autocomplete="bank_name" />
            <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
        </div>

        <!-- bank Account number -->
        <div>
            <x-input-label for="bank_account_number" :value="__('Bank_account_number')" />
            <x-text-input id="bank_account_number" class="block mt-1 w-full" type="text" name="bank_account_number"
                :value="old('bank_account_number')" required autofocus autocomplete="bank_account_number" />
            <x-input-error :messages="$errors->get('bank_account_number')" class="mt-2" />
        </div>

        <!-- description -->
        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                :value="old('description')" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
