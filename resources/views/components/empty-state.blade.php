@props(['title', 'description' => '', 'actionLabel' => null, 'actionUrl' => null])
<div class="text-center py-14 px-4">
    <div class="mx-auto w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-4">
        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
    </div>
    <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ $title }}</h3>
    @if($description)
        <p class="text-sm text-gray-500 max-w-sm mx-auto mb-5">{{ $description }}</p>
    @endif
    @if($actionLabel && $actionUrl)
        <a href="{{ $actionUrl }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-violet-600 text-white text-sm font-medium rounded-lg hover:bg-violet-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            {{ $actionLabel }}
        </a>
    @endif
</div>
