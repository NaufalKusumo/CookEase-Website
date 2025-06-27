<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <section 
            class="relative p-8 rounded-xl shadow-xl text-center max-w-md mx-auto bg-cover bg-center" 
            style="background-image: url('{{ asset('storage/recipes/dashboard_picture.png') }}');"
        >
            <div class="absolute inset-0 bg-white/85 rounded-xl"></div> <!-- Semi-transparent overlay -->

            <div class="relative z-10">
                <!-- Logo -->
                <div class="flex justify-center items-center gap-2 mb-6">
                    <img src="{{ asset('storage/recipes/logo.png') }}" alt="CookEase Logo" class="h-10 w-auto object-contain">
                    <span class="text-2xl font-bold text-gray-800">CookEase</span>    
                </div>

                <h2 class="text-lg text-gray-700 mb-8 font-medium">Daftar atau Masuk</h2>

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
                        autofocus 
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
                        autocomplete="current-password"
                        placeholder="Masukkan password Anda"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-start mb-6 text-left">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" 
                        name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-900">
                        {{ __('Ingat saya') }}
                    </label>
                </div>

                <!-- Forgot Password & Submit -->
                <div class="space-y-4">
                    <x-primary-button class="w-full justify-center py-3">
                        {{ __('Masuk') }}
                    </x-primary-button>

                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a 
                                class="text-sm text-indigo-600 hover:text-indigo-500 underline font-medium" 
                                href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </form>
</x-guest-layout>