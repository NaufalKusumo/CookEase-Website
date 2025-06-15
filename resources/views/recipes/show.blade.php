<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->title }} - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    <!-- Navbar for a logged-in user -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto p-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">CookEase</a>
            <div class="flex items-center space-x-4">
                 @auth
                    <a href="{{ route('recipes.create') }}" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 flex items-center space-x-2">
                        <span>Buat</span>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">
                        <!-- User profile icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </a>
                 @else
                    <a href="{{ route('login') }}" class="px-6 py-2 border border-gray-800 text-gray-800 rounded-full hover:bg-gray-800 hover:text-white">Login/Register</a>
                 @endauth
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Left Column: Recipe Details -->
            <div class="w-full lg:w-2/3">
                <!-- Recipe Header -->
                <h1 class="text-4xl font-bold text-gray-900">{{ $recipe->title }}</h1>
                <div class="mt-2 flex items-center space-x-4 text-gray-600">
                    <span>Author: {{ $recipe->user->name }}</span>
                    <span>·</span>
                    <span>{{ $recipe->created_at->diffForHumans() }}</span>
                    <span>·</span>
                    <div class="flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        <span>3.5</span> <!-- Static for now -->
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-700">{{ $recipe->description }}</p>

                <!-- Recipe Image -->
                <div class="mt-6">
                    @if ($recipe->photo)
                        <img src="{{ asset('storage/' . $recipe->photo) }}" alt="{{ $recipe->title }}" class="w-full rounded-lg object-cover">
                    @endif
                </div>

                <!-- Servings & Time -->
                <div class="mt-6 flex space-x-8 border-t border-b py-4">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        <div>
                            <p class="text-sm text-gray-500">Servings</p>
                            <p class="font-medium">{{ $recipe->servings ?? 'N/A' }}</p>
                        </div>
                    </div>
                     <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div>
                            <p class="text-sm text-gray-500">Prep Time</p>
                            <p class="font-medium">{{ $recipe->cook_time ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Ingredients -->
                <div class="mt-8">
                    <h2 class="text-3xl font-bold">Bahan - Bahan</h2>
                    <div class="mt-4 prose max-w-none">
                        {!! nl2br(e($recipe->ingredients)) !!}
                    </div>
                </div>

                <!-- Instructions -->
                <div class="mt-8">
                    <h2 class="text-3xl font-bold">Langkah - Langkah</h2>
                    <div class="mt-4 space-y-4">
                        @foreach (explode("\n", $recipe->instructions) as $index => $step)
                            @if(trim($step))
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 bg-gray-200 text-gray-700 font-bold rounded-full h-8 w-8 flex items-center justify-center">{{ $index + 1 }}</div>
                                <p class="flex-1 pt-1">{{ trim($step) }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Comment Section (Placeholder) -->
                <div class="mt-12 border-t pt-8">
                    <h2 class="text-3xl font-bold">Komentar</h2>
                    <div class="mt-6 bg-gray-100 p-8 rounded-lg text-center">
                        <p class="text-gray-600">The comment section will be built next!</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-24"> <!-- Makes sidebar follow scroll -->
                    <h3 class="text-xl font-bold mb-4">Other Recipes</h3>
                    <div class="space-y-4">
                        @foreach ($otherRecipes as $other)
                        <a href="{{ route('recipes.show', $other->id) }}" class="flex items-center space-x-4 group">
                            <img src="{{ $other->photo ? asset('storage/' . $other->photo) : 'https://via.placeholder.com/150' }}" alt="{{$other->title}}" class="w-24 h-24 rounded-md object-cover">
                            <div>
                                <h4 class="font-semibold group-hover:text-yellow-600">{{ $other->title }}</h4>
                                <p class="text-sm text-gray-500">by {{ $other->user->name }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>