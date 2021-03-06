<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Status') }}" />
                <select id="role" class="form-select rounded-md shadow-sm mt-1 block w-full" type="role" name="role"  required >
                    <option value="">Select status</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="coordinator">Coordinator</option>
                    <option value="panel">Panel</option>
                    <option value="student">Student</option>
                    <!-- <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option> -->
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="department" value="{{ __('Department') }}" />
                <select id="department" class="form-select rounded-md shadow-sm mt-1 block w-full" type="department" name="department"  required >
                    <option value="">Select Department</option>
                    <option value="SE">SE</option>
                    <option value="IS">IS</option>
                    <option value="AI">AI</option>
                    <option value="MM">MM</option>
                    <option value="STK">STK</option>
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label for="level" value="{{ __('Level') }}" />
                <select id="level" class="form-select rounded-md shadow-sm mt-1 block w-full" type="level" name="level"  required >
                    <option value="">Select Level</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="Undergraduate">Undergraduate</option>
                   
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
