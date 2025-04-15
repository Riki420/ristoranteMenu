<x-guest-layout>
<!--
    <div class="container">
        <hr class="text-white py-4">
        <div class="row">
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="fs-4 text-white py-2" />
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="fs-4 text-white  py-2" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="fs-4 text-white py-2" />
                        <x-text-input id="password" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" />
                    </div>
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="fs-4 text-white py-2" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" />
                    </div>
                    <hr class="py-3">
                    <x-primary-button>{{ __('Register') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
-->
</x-guest-layout>
