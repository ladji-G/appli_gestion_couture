<x-guest-layout>
    <div class="forma">
        <div class="mb-3">
            <p class="text" style="text-align: center; font-size:30px;"><strong>Inscrivez-vous</strong></p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            <div class="row forma">
                @csrf

                <!-- genre -->
                <div class="row">
                    <div class="mb-3 col">
                        <x-input-label class="text" for="genre" :value="__('Femme')" />
                        <x-text-input id="genre" class="block mt-1" type="radio" name="genre" value='F' required autofocus autocomplete="contact" />
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                    <div class="mb-3 col">
                        <x-input-label class="text" for="genre" :value="__('Homme')" />
                        <x-text-input id="genre" class="block mt-1" type="radio" name="genre" value='H' required autofocus autocomplete="contact" />
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                </div>

                <!-- Name -->
                <div class="col-6 mb-3 mt-2">
                    <x-input-label class="text" for="name" :value="__('Nom')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Prenom -->
                <div class="col-6 mb-3 mt-2">
                    <x-input-label class="text" for="prenom" :value="__('Prenom')" />
                    <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>

                <!-- Adress -->
                <div class="col-6 mb-3 mt-2">
                    <x-input-label class="text" for="adresse" :value="__('Adresse')" />
                    <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus autocomplete="adresse" />
                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                </div>

                <!-- contact -->
                <div class="col-6 mb-3 mt-2">
                    <x-input-label class="text" for="contact" :value="__('Contact')" />
                    <x-text-input id="contact" class="block mt-1 w-full" type="number" name="contact" :value="old('contact')" required autofocus autocomplete="contact" />
                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-2 mb-3 col-6">
                    <x-input-label class="text" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-2 mb-3 col-6">
                    <x-input-label class="text" for="password" :value="__('Mot de pass')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-2 mb-3">
                    <x-input-label class="text" for="password_confirmation" :value="__('confirmer le mot de pass')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Déjà inscrit?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __("S'inscrire") }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>