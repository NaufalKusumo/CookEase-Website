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