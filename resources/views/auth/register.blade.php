<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <section 
            class="relative p-6 rounded-xl shadow-xl text-center max-w-md mx-auto bg-cover bg-center backdrop-blur-md" 
            style="background-image: url('{{ asset('storage/recipes/dashboard_picture.png') }}');"
        >
            <div class="absolute inset-0 bg-white/60 rounded-xl"></div> <!-- Overlay -->

            <div class="relative z-10">
                <!-- Logo -->
                <div class="flex justify-center items-center gap-2 mb-6">
                    <img src="{{ asset('storage/recipes/logo.png') }}" alt="CookEase Logo" class="h-10 w-auto object-contain">
                    <span class="text-2xl font-bold text-gray-800">CookEase</span>    
                </div>

                <h2 class="text-md text-gray-700 mb-6">Daftar Akun Baru</h2>

                <!-- Name -->
                <div class="mb-4 text-left">
                    <x-input-label for="name" :value="__('Name')" class="text-black" />
                    <x-text-input 
                        id="name" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-gray-800" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email Address -->
                <div class="mb-4 text-left">
                    <x-input-label for="email" :value="__('Email')" class="text-black" />
                    <x-text-input 
                        id="email" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-gray-800" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-4 text-left">
                    <x-input-label for="password" :value="__('Password')" class="text-black" />
                    <x-text-input 
                        id="password" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-gray-800" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4 text-left">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-black" />
                    <x-text-input 
                        id="password_confirmation" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-gray-800" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a 
                        class="text-sm text-indigo-500 hover:text-indigo-700 underline" 
                        href="{{ route('login') }}">
                        {{ __('Sudah ada akun?') }}
                    </a>

                    <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </div>
        </section>
    </form>
</x-guest-layout>
