<!-- resources/views/tips/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Kitchen Tips - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Header/Navbar -->
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
                    placeholder="Cari resep atau tip..." 
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
    <main class="container mx-auto p-8 mt-24">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Lihat Semua Tips</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($tips as $tip)
                @include('partials._tip-card', ['tip' => $tip])
            @endforeach
        </div>
        <div class="mt-12">
        <!-- Blade directive that automatically renders the "Page 1, 2, 3..." navigation links -->
            {{ $tips->links() }}
        </div>
    </main>
            <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h3 class="text-4xl font-bold mb-4">COOK.</h3>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    From quick and easy meals to gourmet delights, we have something for every taste and occasion
                </p>
            </div>
            
            <div class="flex justify-center space-x-12 text-lg">
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors">Beranda</a>
                <a href="{{ route('recipes.index') }}" class="text-gray-300 hover:text-white transition-colors">Resep</a>
                <a href="{{ route('tips.index') }}" class="text-gray-300 hover:text-white transition-colors">Tips Dapur</a>
            </div>
                        
            <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; 2025 CookEase. All rights reserved.</p>
            </div>
        </div>
    </footer>

<!-- Modal Content  -->  
<div id="create-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center p-4">
    <!-- Modal Content Box -->
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-sm w-full relative">
        <!-- Modal Header -->
        <button id="close-modal-btn" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-3xl font-bold leading-none focus:outline-none">&times;</button>
        <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 text-center">Apa yang akan kamu buat ?</h3>
        </div>
        <!-- Modal Body (The Choices) -->
        <div class="flex flex-col gap-4 items-center">
            <a href="{{ route('recipes.create') }}"
                class="w-full block text-center px-6 py-4 bg-gray-100 text-gray-900 font-semibold rounded-xl hover:bg-gray-200 transition-colors text-lg shadow-sm">
                Resep Dapur
            </a>
            <a href="{{ route('tips.create') }}"
                class="w-full block text-center px-6 py-4 bg-gray-100 text-gray-900 font-semibold rounded-xl hover:bg-gray-200 transition-colors text-lg shadow-sm">
                Tips Dapur
            </a>
        </div>
    </div>
</div>
<!-- ... The Modal HTML from above ... -->

<script>
    // Find the elements we need on the page by their IDs
    const openModalBtn = document.getElementById('open-modal-btn');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const createModal = document.getElementById('create-modal');

    // Check if the open button exists (it only does for logged-in users)
    if (openModalBtn) {
        // --- Event Listener to OPEN the modal ---
        // When the "Create!" button is clicked...
        openModalBtn.addEventListener('click', function() {
            // ...remove the 'hidden' class from the modal to make it visible.
            createModal.classList.remove('hidden');
        });
    }

    // --- Event Listener to CLOSE the modal (using the 'X' button) ---
    // When the close button is clicked...
    closeModalBtn.addEventListener('click', function() {
        // ...add the 'hidden' class back to the modal to hide it.
        createModal.classList.add('hidden');
    });

    // --- (Optional but good UX) Event Listener to CLOSE the modal by clicking the background ---
    // When the user clicks anywhere on the modal container...
    createModal.addEventListener('click', function(event) {
        // ...check if the click was on the dark background itself (the parent)
        // and not on the white content box (a child).
        if (event.target === createModal) {
            createModal.classList.add('hidden');
        }
    });
</script>

</body>
</html>