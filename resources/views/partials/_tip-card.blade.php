<a href="{{ route('tips.show', $tip->id) }}" class="block bg-white rounded-lg shadow-md overflow-hidden group hover:shadow-xl transition-shadow duration-300">
    
    <!-- 1. The Image Section -->
    <div class="relative">
        @if ($tip->photo)
            <!-- Display the tip's photo from storage -->
            <img src="{{ asset('storage/' . $tip->photo) }}" alt="{{ $tip->title }}" class="w-full h-48 object-cover">
        @else
            <!-- Show a placeholder if no photo -->
            <img src="https://via.placeholder.com/400x300.png/ccfbf1/15803d?text=Kitchen+Tip" alt="{{ $tip->title }}" class="w-full h-48 object-cover">
        @endif
    </div>

    <!-- 2. The Text Content Section -->
    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 truncate">{{ $tip->title }}</h3>
        <p class="text-gray-600 mt-2 text-sm h-10 overflow-hidden">{{ $tip->description }}</p> <!-- Set a fixed height for consistency -->
        <div class="mt-4 flex justify-between items-center">
            <span class="text-sm text-gray-500">Author: {{ $tip->user->name }}</span>
            <div class="flex items-center space-x-1">
                <!-- Star Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                <span class="text-gray-600 font-medium">N/A</span> <!-- Tips don't have ratings yet -->
            </div>
        </div>
    </div>

</a> <!-- End of the card link -->