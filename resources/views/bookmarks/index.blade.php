<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Bookmarks - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Header/Navbar -->
    <header class="absolute top-0 left-0 right-0 z-10">
        <nav class="container mx-auto px-4 py-2 flex justify-between items-center bg-white bg-opacity-75 shadow-md fixed top-0 z-50">
            <!-- Logo -->
            <div class="flex items-center space-x-2 flex-shrink-0">
                <!-- You can put your SVG logo icon here -->
                <img src="{{ asset('storage/recipes/logo.png') }}" alt="CookEase Logo" class="w-auto h-8 max-w-[50px] object-contain">
                <span class="text-2xl font-bold text-black-800">CookEase</span>
            </div>
            <!-- Search Form -->
            <form method="GET" action="{{ route('search.index') }}" class="relative flex-1 max-w-md mx-8">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request()->input('q') }}"
                    placeholder="Cari resep atau tips..." 
                    class="w-full py-2 pl-4 pr-10 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                <button type="submit" class="absolute top-0 right-0 mt-2 mr-3 text-black-500 font-bold hover:text-gray-800">
                    <!-- Search Icon SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </form>
            <!-- Nav Links -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-black-700 font-bold hover:text-green-600">Beranda</a>
                <a href="{{ route('recipes.index') }}" class="text-black-700 font-bold hover:text-green-600">Resep</a>
                <a href="{{ route('tips.index') }}" class="text-black-700 font-bold hover:text-green-600">Tips Dapur</a>
            </div>

            <!-- Login/Register OR User Info -->
            <div class="flex items-center space-x-4">
                @guest
                    <!-- This HTML will ONLY show if the user is a GUEST -->
                    <a href="{{ route('login') }}" class="px-6 py-2 border border-gray-800 font-bold text-gray-800 rounded-full hover:bg-gray-800 hover:text-white">Masuk</a>
                    <a href="{{ route('register') }}" class="px-6 py-2 border border-gray-800 font-bold text-gray-800 rounded-full hover:bg-gray-800 hover:text-white">Daftar</a>
                @endguest

                @auth
                    <!-- This HTML will ONLY show if the user is LOGGED IN -->
                    <div class="flex items-center space-x-3">
                        
                        {{-- THIS IS THE NEW PART --}}
                        @if (auth()->user() && auth()->user()->role === 'admin')
                            <a href="{{ route('admin.reports.index') }}" class="px-3 py-2 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 text-sm ml-2">
                                Laporan 
                            </a>
                        @endif
                        {{-- END OF NEW PART --}}

                        <!-- "Create!" button and user menu -->
                        <a href="{{ route('bookmarks.index') }}" class="text-black-700 font-bold hover:text-green-600">Favoritku</a>
                        <button id="open-modal-btn" class="px-3 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600">Buat!</button>
                        
                        <span class="text-gray-700 font-medium">Hai, {{ auth()->user()->name }}</span>
                        <a href="{{ route('dashboard') }}" title="My Dashboard" class="text-gray-600 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-6 py-2 border border-gray-800  text-gray-800 font-bold rounded-full hover:bg-gray-800 hover:text-white">Keluar</button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </header>
    <!-- In resources/views/bookmarks/index.blade.php -->
    <main class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 mt-20">Favoritku</h1>
        
        @if ($recipes->isEmpty() && $tips->isEmpty())
            <p>Kamu belum menyimpan.</p>
        @endif

        <!-- Bookmarked Recipes Section -->
        @if (!$recipes->isEmpty())
            <section class="mb-12">
                <h2 class="text-2xl font-semibold mb-4">Resep favorit</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($recipes as $recipe)
                        @include('partials._recipe-card', ['recipe' => $recipe])
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Bookmarked Tips Section -->
        @if (!$tips->isEmpty())
            <section>
                <h2 class="text-2xl font-semibold mb-4">Tips Favorit</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($tips as $tip)
                        @include('partials._tip-card', ['tip' => $tip])
                    @endforeach
                </div>
            </section>
        @endif
    </main>
</body>
</html>