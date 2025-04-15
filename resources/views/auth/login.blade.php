<x-guest-layout>
<div class="container">
    <hr class="text-white py-4">
    <div class="row align-items-center justify-content-center">
        <div class="col d-flex justify-content-center">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" class="fs-4 py-2 text-white" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="fs-4 py-2 text-white" />
                    <x-text-input id="password" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" />
                </div>
                <hr class="py-2 text-white">
                <x-primary-button>{{ __('Login') }}</x-primary-button>
            </form>

        </div>
    </div>
</div>

</x-guest-layout>
