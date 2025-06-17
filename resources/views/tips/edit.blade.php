<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Tip - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto p-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">CookEase</a>
            <div>
                <button type="submit" form="tip-form" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600">Terbitkan</button>
            </div>
        </nav>
    </header>

    <!-- Main Form Content -->
    <main class="container mx-auto p-8 max-w-4xl">
        <form id="tip-form" method="POST" action="{{ route('tips.update', $tip->id) }}" enctype="multipart/form-data">
            @csrf <!-- IMPORTANT: Laravel security token -->
            @method('PUT')

            <!-- Title -->
            <input type="text" name="title" placeholder="Judul Tip (Wajib)" value="{{ old('title', $tip->title) }}" class="w-full text-4xl font-bold bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            <p class="mt-2 text-gray-600">Author: {{ Auth::user()->name }}</p>

            <!-- Short Description (for the card) -->
            <div class="mt-6">
                <label for="description" class="text-xl font-bold">Deskripsi Singkat (Wajib)</label>
                <textarea name="description" id="description" rows="3" placeholder="Tuliskan ringkasan singkat tipmu di sini. Ini akan muncul di kartu homepage." class="mt-2 w-full text-lg bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description', $tip->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Main Content -->
            <div class="mt-6">
                <label for="content" class="text-xl font-bold">Isi Tip Lengkap (Wajib)</label>
                <textarea name="content" id="content" rows="8" placeholder="Tuliskan isi lengkap tip dapurmu di sini..." class="mt-2 w-full text-lg bg-gray-100 p-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('content', $tip->content) }}</textarea>
                @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Photo Upload -->
            <div id="photo-preview-container" class="mt-6 w-full h-80 bg-gray-100 rounded-md border-2 border-dashed border-gray-300 flex items-center justify-center bg-cover bg-center">
                <label for="photo" class="cursor-pointer text-center text-gray-500">
                    <div id="photo-preview-placeholder">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                        <span>Foto Tip (Optional)</span>
                    </div>
                    <input id="photo" name="photo" type="file" class="hidden" accept="image/*">
                </label>
            </div>
            @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </form>
    </main>
    
    <!-- The JavaScript for the image preview -->
    <script>
        const photoInput = document.getElementById('photo');
        const previewContainer = document.getElementById('photo-preview-container');
        const previewPlaceholder = document.getElementById('photo-preview-placeholder');
        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewPlaceholder.style.display = 'none';
                    previewContainer.style.backgroundImage = `url('${e.target.result}')`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>