<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-g">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Pending Reports - CookEase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- an add a dedicated admin navigation bar here later -->
    <header class="bg-white shadow">
        <div class="container mx-auto p-4">
            <a href="/" class="text-xl font-bold">Back to CookEase Site</a>
        </div>
    </header>

    <main class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Pending Content Reports</h1>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left ...">Reported Item</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left ...">Reason</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left ...">Reported By</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left ...">Date</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left ...">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <!-- Polymorphic Link to the reported content -->
                                @if ($report->reportable)
                                    <a href="{{ url($report->reportable->path()) }}" target="_blank" class="text-blue-600 hover:underline">
                                        {{ $report->reportable->title }}
                                    </a>
                                    <span class="text-xs block text-gray-500">({{ class_basename($report->reportable_type) }})</span>
                                @else
                                    <span class="text-red-500">Content Deleted</span>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $report->reason }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $report->user->name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $report->created_at->format('d M Y') }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <form method="POST" action="{{ route('admin.reports.resolve', $report->id) }}">
                                    @csrf 
                                    @method('PATCH')
                                    <button type="submit" class="text-green-600 hover:text-green-900">
                                        Tandai Sudah Selesai
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10">Tidak Ada Laporan. Kerja Bagus!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>