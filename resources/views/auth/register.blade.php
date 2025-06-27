<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <section 
            class="relative p-6 rounded-xl shadow-xl text-center w-[600px] max-w-full mx-auto bg-white"
        >


            <div class="relative z-10">
                <!-- Logo -->
                <div class="flex justify-center items-center gap-2 mb-6">
                    <img src="{{ asset('storage/recipes/logo.png') }}" alt="CookEase Logo" class="h-10 w-auto object-contain">
                    <span class="text-2xl font-bold text-gray-800">CookEase</span>    
                </div>

                <h2 class="text-lg text-gray-700 mb-8 font-medium">Daftar Akun Baru</h2>

                <!-- Name -->
                <div class="mb-6 text-left">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input 
                        id="name" 
                        class="mt-2 block w-full px-3 py-3" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="Masukkan nama lengkap Anda"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-6 text-left">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input 
                        id="email" 
                        class="mt-2 block w-full px-3 py-3" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username"
                        placeholder="Masukkan email Anda"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6 text-left">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input 
                        id="password" 
                        class="mt-2 block w-full px-3 py-3" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        placeholder="Masukkan password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6 text-left">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input 
                        id="password_confirmation" 
                        class="mt-2 block w-full px-3 py-3" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        placeholder="Konfirmasi password"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button & Login Link -->
                <div class="space-y-4">
                    <x-primary-button class="w-full justify-center py-3">
                        {{ __('Daftar') }}
                    </x-primary-button>

                    <div class="text-center">
                        <a 
                            class="text-sm text-indigo-600 hover:text-indigo-500 underline font-medium" 
                            href="{{ route('login') }}">
                            {{ __('Sudah ada akun?') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-guest-layout>