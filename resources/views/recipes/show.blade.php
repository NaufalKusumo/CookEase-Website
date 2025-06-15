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
                    <div class="mt-4 space-y-3">
                        @foreach (explode("\n", $recipe->instructions) as $step)
                            @if(trim($step)) {{-- Only render if step is not empty --}}
                            <div class="instruction-item flex items-start space-x-2"> {{-- Reduced space-x from 3 to 2 --}}
                                <input type="checkbox" 
                                       id="step-{{ $recipe->id }}-{{ $loop->index }}" 
                                       name="step-{{ $recipe->id }}-{{ $loop->index }}"
                                       class="mt-1 h-5 w-5 shrink-0 rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 cursor-pointer">
                                
                                {{-- Wrapper for timer controls and the instruction label --}}
                                <div class="instruction-content-wrapper flex-grow flex items-center space-x-1.5">  {{-- Changed items-start to items-center --}}
                                    {{-- Timer controls (button and display) will be prepended here by JavaScript if applicable --}}
                                    <label for="step-{{ $recipe->id }}-{{ $loop->index }}" class="text-gray-700 cursor-pointer select-none"> {{-- Removed pt-0.5 --}}
                                        {{ trim($step) }}
                                    </label>
                                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const instructionItems = document.querySelectorAll('.instruction-item');

            instructionItems.forEach((item, loopIndex) => { // loopIndex is available if needed, but checkbox.id is more robust
                const checkbox = item.querySelector('input[type="checkbox"]');
                const contentWrapper = item.querySelector('.instruction-content-wrapper');
                const label = contentWrapper.querySelector('label');
                const checkboxId = checkbox.id; // Unique ID for localStorage key
                const instructionText = label.textContent || label.innerText;

                // Load saved state from localStorage
                if (localStorage.getItem(checkboxId) === 'true') {
                    checkbox.checked = true;
                    label.classList.add('line-through', 'text-gray-500');
                }

                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        label.classList.add('line-through', 'text-gray-500');
                        localStorage.setItem(checkboxId, 'true'); // Save state
                    } else {
                        label.classList.remove('line-through', 'text-gray-500');
                        localStorage.setItem(checkboxId, 'false'); // Save state
                    }
                });

                // Timer feature logic
                const timeRegex = /(\d+)\s*menit/i; // Matches "XX menit", case-insensitive
                const match = timeRegex.exec(instructionText);

                if (match && match[1]) {
                    const minutes = parseInt(match[1], 10);
                    if (minutes > 0) {
                        const timerButton = document.createElement('button');
                        timerButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 group-hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
                        timerButton.title = `Start ${minutes} minute timer`;
                        timerButton.classList.add('timer-start-button', 'p-0.5', 'rounded-full', 'focus:outline-none', 'focus:ring-2', 'focus:ring-blue-300', 'shrink-0', 'group'); // Removed mt-1

                        const timerDisplay = document.createElement('span');
                        // Initial classes for animation: starts hidden and with no width.
                        // On click, 'max-w-0' and 'opacity-0' will be removed, and 'min-w-[45px]' (or a specific max-width) will allow it to expand.
                        timerDisplay.classList.add('timer-countdown', 'text-sm', 'text-green-600', // Changed text-gray-600 to text-green-600
                                                 'text-left', 'font-mono', 'shrink-0', 
                                                 'max-w-0', 'opacity-0', 'overflow-hidden', // Initially hidden & zero-width
                                                 'transition-all', 'duration-300', 'ease-in-out'); // Animation classes
                        // timerDisplay.textContent = `${minutes}:00`; // Optionally show initial time

                        // Prepend display then button to contentWrapper for [Display] [Button] [Label] order
                        // This ensures the display expands to the left of the button.
                        contentWrapper.prepend(timerButton);
                        contentWrapper.prepend(timerDisplay); 

                        let timerInterval;
                        let timeRemainingInSeconds = minutes * 60;

                        function updateTimerDisplay() {
                            const displayMinutes = Math.floor(timeRemainingInSeconds / 60);
                            const displaySeconds = timeRemainingInSeconds % 60;
                            timerDisplay.textContent = `${displayMinutes}:${displaySeconds < 10 ? '0' : ''}${displaySeconds}`;
                        }

                        timerButton.addEventListener('click', function() {
                            if (timerInterval) { // Timer is already running or finished
                                return;
                            }

                            this.disabled = true;
                            this.classList.add('opacity-50', 'cursor-not-allowed');
                            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`; // Faded clock

                            // Animate the timer display to open
                            timerDisplay.classList.remove('max-w-0', 'opacity-0');
                            // Add a class that defines its visible width, min-w-[45px] should work once max-w-0 is removed.
                            timerDisplay.classList.add('min-w-[45px]', 'opacity-100'); 

                            timeRemainingInSeconds = minutes * 60; // Reset if somehow re-triggered, though disabled
                            updateTimerDisplay();

                            timerInterval = setInterval(() => {
                                timeRemainingInSeconds--;
                                updateTimerDisplay();

                                if (timeRemainingInSeconds <= 0) {
                                    clearInterval(timerInterval);
                                    timerInterval = null; // Clear the interval ID
                                    timerDisplay.textContent = "Done!";
                                    timerButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>`; // Checkmark icon
                                    // Button remains disabled as "finished"

                                    if (!checkbox.checked) {
                                        checkbox.checked = true;
                                        // Manually dispatch change event for localStorage and styling updates
                                        const event = new Event('change', { bubbles: true });
                                        checkbox.dispatchEvent(event);
                                    }
                                }
                            }, 1000);
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>