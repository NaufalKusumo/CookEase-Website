<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Bookmarks - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
        <!-- Header/Navbar -->
    <header class="absolute top-0 left-0 right-0 z-10">
        <nav class="container mx-auto p-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <!-- You can put your SVG logo icon here -->
                <span href="/" class="text-2xl font-bold text-gray-800">CookEase</span>
            </div>
            <!-- Search Form -->
            <form method="GET" action="{{ route('search.index') }}" class="relative flex-1 max-w-md mx-8">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request()->input('q') }}"
                    placeholder="Cari resep atau tip..." 
                    class="w-full py-2 pl-4 pr-10 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                <button type="submit" class="absolute top-0 right-0 mt-2 mr-3 text-gray-500 hover:text-gray-800">
                    <!-- Search Icon SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </form>
            <!-- Nav Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-gray-700 hover:text-green-600">Beranda</a>
                <a href="#" class="text-gray-700 hover:text-green-600">Resep</a>
                <a href="#" class="text-gray-700 hover:text-green-600">Tips Dapur</a>
            </div>
            <!-- Login/Register Button -->
            <!-- Login/Register OR User Info -->
            <div class="flex items-center space-x-4">
                @guest
                    <!-- This HTML will ONLY show if the user is a GUEST -->
                    <a href="{{ route('login') }}" class="px-6 py-2 border border-gray-800 text-gray-800 rounded-full hover:bg-gray-800 hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="px-6 py-2 border border-gray-800 text-gray-800 rounded-full hover:bg-gray-800 hover:text-white">Register</a>
                @endguest

                @auth
                    <!-- This HTML will ONLY show if the user is LOGGED IN -->
                    <a href="{{ route('bookmarks.index') }}">My Bookmarks</a>
                    <button id="open-modal-btn" class="px-6 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600">Create!</button>
                    
                    <span class="text-gray-700 font-medium">Hi, {{ auth()->user()->name }}</span>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-800">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>
    <!-- In resources/views/bookmarks/index.blade.php -->
    <main class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 mt-20">My Bookmarks</h1>
        
        @if ($recipes->isEmpty() && $tips->isEmpty())
            <p>You haven't bookmarked anything yet.</p>
        @endif

        <!-- Bookmarked Recipes Section -->
        @if (!$recipes->isEmpty())
            <section class="mb-12">
                <h2 class="text-2xl font-semibold mb-4">Bookmarked Recipes</h2>
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
                <h2 class="text-2xl font-semibold mb-4">Bookmarked Tips</h2>
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