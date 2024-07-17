<x-guest-layout>
    <form method="POST" action="{{ route('couturier.register.create') }}" enctype="multipart/form-data">
        <div class="row forma">
            <div class="mb-3">
                <p class="text" style="text-align: center; font-size:30px;"><strong>Inscrire un employé</strong></p>
            </div>
            @csrf

            <!-- genre -->
            <div class="row">
                <label for="genre" class="color">Genre</label>
                    <div class="mb-3 col">
                        <x-input-label class="text" for="genre" :value="__('Femme')" />
                        <x-text-input id="genre" class="block mt-1" type="radio" name="genre" value='Femme' required autofocus autocomplete="contact" />
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                    <div class="mb-3 col">
                        <x-input-label class="text" for="genre" :value="__('Homme')" />
                        <x-text-input id="genre" class="block mt-1" type="radio" name="genre" value='Homme' required autofocus autocomplete="contact" />
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                </div>

            <!-- Name -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="name" class="color" :value="__('Nom')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Prenom -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="Prenom" class="color" :value="__('Prenom')" />
                <x-text-input id="Prenom" class="block mt-1 w-full" type="text" name="Prenom" :value="old('Prenom')" required autofocus autocomplete="Prenom" />
                <x-input-error :messages="$errors->get('Prenom')" class="mt-2" />
            </div>

            <!-- Adresse -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="adresse" class="color" :value="__('Adresse')" />
                <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus autocomplete="adresse" />
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>

            <!-- Telephone -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="telephone" class="color" :value="__('Contact')" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus autocomplete="telephone" />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="email" class="color" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Specialité -->
            <div class="row">
            <label for="genre" class="color">Spécialité</label>
                    <div class="mb-3 col">
                        <x-input-label class="text" for="specialite" :value="__('Dame')" />
                        <x-text-input id="specialite" class="block mt-1" type="radio" name="specialite" value='Femme' required autofocus autocomplete="specialite" />
                        <x-input-error :messages="$errors->get('specialite')" class="mt-2" />
                    </div>
                    <div class="mb-3 col">
                        <x-input-label class="text" for="specialite" :value="__('Homme')" />
                        <x-text-input id="specialite" class="block mt-1" type="radio" name="specialite" value='Homme' required autofocus autocomplete="specialite" />
                        <x-input-error :messages="$errors->get('specialite')" class="mt-2" />
                    </div>
                </div>

            <!-- Salaire horaire -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="salaire_horaire" class="color" :value="__('salaire horaire')" />
                <x-text-input id="salaire_horaire" class="block mt-1 w-full" type="text" name="salaire_horaire" :value="old('salaire_horaire')" required autofocus autocomplete="salaire_horaire" />
                <x-input-error :messages="$errors->get('salaire_horaire')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="password" class="color" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="col-6 mb-3 mt-2">
                <x-input-label for="password_confirmation" class="color" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Image -->
            <!-- <div class="col-6 mb-3 mt-2">
                <label for="formFileSm" class="form-label color"><strong>choisi une image</strong></label>
                <input class="form-control " id="formFileSm" type="file" name="image" value="{{ old('file') }}">
            </div> -->
    <div class="col-6 mb-3 mt-2">
    <label for="file-upload" class="custom-file-upload">
    <img src="/img/2.png" alt=""> Choisir une image
                </label>
            <input id="file-upload" type="file" name="image" value="{{ old('file') }}"/>
    </div>
         

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>