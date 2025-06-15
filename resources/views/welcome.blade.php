<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookEase - Easy & Tasty Recipes</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white font-sans">

    <!-- Header/Navbar -->
    <header class="absolute top-0 left-0 right-0 z-10">
        <nav class="container mx-auto p-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <!-- You can put your SVG logo icon here -->
                <span class="text-2xl font-bold text-gray-800">CookEase</span>
            </div>
            <!-- Search Bar -->
            <div class="relative flex-1 max-w-md mx-8">
                <input type="text" placeholder="Cari resep favoritmu di sini" class="w-full py-2 px-4 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
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
                    <a href="{{route ('recipes.create')}}" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-full hover:bg-green-500">Make Recipe</a>
                    
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

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center text-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542010589005-d1eacc3918f2?q=80&w=2070&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-white/50"></div> <!-- Semi-transparent overlay -->
        <div class="relative z-5">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-900">Cook Like a Pro With<br>Our Easy And Tasty Recipes</h1>
            <p class="mt-4 text-lg text-gray-700">Discover simple, mouthwatering recipes that anyone can whip up in minutes</p>
            <a href="#" class="mt-8 inline-block px-8 py-3 bg-gray-800 text-white font-semibold rounded-full hover:bg-gray-700">Explore All Recipes</a>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="container mx-auto p-8">

        <!-- New Recipes Section -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">New Recipes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- This is the loop that displays the recipes! -->
            @foreach ($newRecipes as $recipe)
                <!-- THIS IS THE MAIN "CARD" DIV. IT'S THE DIRECT CHILD OF THE GRID. -->
                <a href="{{ route('recipes.show', $recipe->id) }}" class="block bg-white rounded-lg shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300">
                    
                    <!-- 1. The Image Section (goes inside the card) -->
                    <div class="relative">
                        @if ($recipe->photo)
                            <!-- If the recipe HAS a photo, display it from storage -->
                            <img src="{{ asset('storage/' . $recipe->photo) }}" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                        @else
                            <!-- If the recipe does NOT have a photo, show a placeholder -->
                            <img src="https://images.unsplash.com/photo-1466637574441-749b8f19452f?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="{{ $recipe->title }}" class="w-full h-48 object-cover">
                        @endif
                        
                        <div class="absolute top-2 right-2 bg-white p-2 rounded-full cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                        <!-- Bookmark Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>
                        </div>
                    </div>

                    <!-- 2. The Text Content Section (also goes inside the card) -->
                    <div class="p-4">
                        <p class="text-sm text-gray-500">Breakfast</p>
                        <h3 class="text-xl font-semibold text-gray-800 truncate">{{ $recipe->title }}</h3>
                        <p class="text-gray-600 mt-2 text-sm truncate">{{ $recipe->description }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500">Author: {{ $recipe->user->name }}</span>
                            <div class="flex items-center space-x-1">
                                <!-- Star Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                <span class="text-gray-600 font-medium">3.5</span>
                            </div>
                        </div>
                    </div>

                </a> <!-- END OF THE MAIN CARD DIV -->
            @endforeach
                
            </div>
        </section>

        <!-- You can copy the section above for "Best Recipes", "New Tips", etc. -->

    </main>

</body>
</html>