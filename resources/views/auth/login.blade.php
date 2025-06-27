<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <section 
            class="relative p-6 rounded-xl shadow-xl text-center max-w-md mx-auto bg-cover bg-center backdrop-blur-md" 
            style="background-image: url('{{ asset('storage/recipes/dashboard_picture.png') }}');"
        >
            <div class="absolute inset-0 bg-white/60 rounded-xl"></div> <!-- Semi-transparent overlay -->

            <div class="relative z-10">
                <!-- Logo -->
                <div class="flex justify-center items-center gap-2 mb-6">
                    <img src="{{ asset('storage/recipes/logo.png') }}" alt="CookEase Logo" class="h-10 w-auto object-contain">
                    <span class="text-2xl font-bold text-gray-800">CookEase</span>    
                </div>

                <h2 class="text-md text-gray-700 mb-6">Daftar atau Masuk</h2>

                <!-- Email Address -->
                <div class="mb-4 text-left">
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-black" />
                    <x-text-input 
                        id="email" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-gray-800" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
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
                        autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-start mt-4 mb-2 text-left">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                        name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">
                        {{ __('Ingat saya') }}
                    </label>
                </div>

                <!-- Forgot Password & Submit -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a 
                            class="text-sm text-indigo-500 hover:text-indigo-700 underline" 
                            href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </div>
        </section>
    </form>
</x-guest-layout>
