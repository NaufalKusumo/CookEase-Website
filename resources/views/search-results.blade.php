<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results for "{{ $query }}" - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <!-- You can copy your standard header HTML here -->
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto p-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">CookEase</a>
            
            <!-- Paste your Search Form code here again for consistency -->
            <form method="GET" action="{{ route('search.index') }}" class="relative flex-1 max-w-md mx-8">
                <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Cari resep atau tip..." class="w-full py-2 pl-4 pr-10 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit" class="absolute top-0 right-0 mt-2 mr-3 text-gray-500 hover:text-gray-800"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg></button>
            </form>

            <!-- Paste your User Auth section here (login button or user menu) -->
            <div>@auth <button id="open-modal-btn" class="px-6 py-2 bg-yellow-500 text-white font-semibold rounded-full hover:bg-yellow-600">Create!</button> @else <a href="/login">Login</a> @endauth</div>
        </nav>
    </header>

    <main class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Search Results for "<span class="text-green-600">{{ $query }}</span>"
        </h1>

        <!-- No Results Message -->
        @if ($recipes->isEmpty() && $tips->isEmpty())
            <div class="text-center bg-white p-12 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-700">Hasil Tidak Ditemukan</h2>
                <p class="mt-2 text-gray-500">Kita tidak dapat menemukan resep maupun tips yang anda maksud.</p>
            </div>
        @endif

        <!-- Recipes Found -->
        @if (!$recipes->isEmpty())
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Recipes Found</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($recipes as $recipe)
                        <!-- You can reuse your recipe card component/include here -->
                        @include('partials._recipe-card', ['recipe' => $recipe])
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Tips Found -->
        @if (!$tips->isEmpty())
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Tips Found</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                     @foreach ($tips as $tip)
                        <!-- You can reuse your tip card component/include here -->
                        @include('partials._tip-card', ['tip' => $tip])
                    @endforeach
                </div>
            </section>
        @endif
    </main>
    
    <!-- Include your modal HTML and scripts here if needed -->
</body>
</html>