<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Recipe - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto p-4 flex justify-between items-center">
            <div class="flex items-center space-x-2 flex-shrink-0">
            <!-- You can put your SVG logo icon here -->
            <img src="{{ asset('storage/recipes/logo.png') }}" alt="CookEase Logo" class="flex items-center space-x-2 flex-shrink-0 w-auto h-8 max-w-[50px] object-contain">
            <span class="text-2xl font-bold text-black-800">CookEase</span>
            </div>
            <div>
                <!-- The form ID here is 'recipe-form' -->
                <button type="button" class="px-4 py-2 border border-red-500 text-red-500 rounded-md mr-2 hover:bg-red-50">Hapus</button>
                <button type="submit" form="recipe-form" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600">Terbitkan</button>
            </div>
        </nav>
    </header>

    <!-- Main Form Content -->
    <main class="container mx-auto p-8">
        <!-- We link the form to the buttons in the navbar using its ID -->
        <form id="recipe-form" method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
            @csrf <!-- IMPORTANT: Laravel security token -->

            <!-- Title -->
            <input type="text" name="title" placeholder="Judul Resep (Wajib)" value="{{ old('title') }}" class="w-full text-4xl font-bold bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            <p class="mt-2 text-gray-600">Author: {{ Auth::user()->name }}</p>

            <!-- Description -->
            <textarea name="description" placeholder="Keterangan singkat dibalik resepmu (Optional)" class="mt-4 w-full text-lg bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description') }}</textarea>

            <!-- Photo Upload -->
            <div id="photo-preview-container" class="mt-6 w-full h-80 bg-gray-100 rounded-md border-2 border-dashed border-gray-300 flex items-center justify-center bg-cover bg-center">
                <label for="photo" class="cursor-pointer text-center text-gray-500">
                    <!-- This is the placeholder we will hide -->
                    <div id="photo-preview-placeholder">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                        <span>Foto Resep (Opsional)</span>
                    </div>
                    <input id="photo" name="photo" type="file" class="hidden" accept="image/*">
                </label>
            </div>
            @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror


            <!-- Servings & Time -->
            <div class="mt-6 flex space-x-8 text-lg">
                <div class="flex items-center">
                    <input type="text" name="servings" placeholder="40 Porsi" class="bg-gray-100 p-2 rounded-md w-32">
                </div>
                <div class="flex items-center">
                     <input type="text" name="cook_time" placeholder="20min" class="bg-gray-100 p-2 rounded-md w-32">
                </div>
            </div>

            <!-- Ingredients -->
            <div class="mt-10">
                <h2 class="text-3xl font-bold">Bahan - Bahan</h2>
                <textarea name="ingredients" rows="8" placeholder="3 kg beras
300 g ketan
Garam..." class="mt-4 w-full text-lg bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('ingredients') }}</textarea>
                @error('ingredients') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                <p class="mt-2 text-gray-500">Tip: Tulis satu bahan per baris.</p>
            </div>

            <!-- Instructions -->
            <div class="mt-10">
                <h2 class="text-3xl font-bold">Langkah - Langkah</h2>
                 <textarea name="instructions" rows="8" placeholder="1. Cuci beras lalu rendam...
2. Tiriskan air..." class="mt-4 w-full text-lg bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('instructions') }}</textarea>
                @error('instructions') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                 <p class="mt-2 text-gray-500">Tip: Tulis satu langkah per baris.</p>
            </div>
        </form>
    </main>

            <!-- ADD THIS SCRIPT BLOCK RIGHT HERE -->
        <script>
            // Find the elements on the page by their ID
            const photoInput = document.getElementById('photo');
            const previewContainer = document.getElementById('photo-preview-container');
            const previewPlaceholder = document.getElementById('photo-preview-placeholder');

            // Listen for when the user selects a file
            photoInput.addEventListener('change', function() {
                const file = this.files[0]; // Get the selected file

                if (file) {
                    // If a file was selected, use the FileReader tool
                    const reader = new FileReader();

                    // Tell the reader what to do when it's done reading the file
                    reader.onload = function(e) {
                        // Hide the placeholder text and icon
                        previewPlaceholder.style.display = 'none';

                        // Set the background of the container to the image
                        previewContainer.style.backgroundImage = `url('${e.target.result}')`;
                    }

                    // Start reading the file
                    reader.readAsDataURL(file);
                }
            });
        </script>
</body>
</html>