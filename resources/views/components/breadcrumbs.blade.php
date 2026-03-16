@props(['links' => []])
<nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-1.5 text-sm text-gray-500">
        <li>
            <a href="{{ route('dashboard') }}" class="hover:text-gray-900 transition">Accueil</a>
        </li>
        @foreach($links as $label => $url)
            <li class="flex items-center">
                <svg class="w-3.5 h-3.5 mx-1 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                @if($loop->last)
                    <span class="text-gray-900 font-medium">{{ $label }}</span>
                @else
                    <a href="{{ $url }}" class="hover:text-gray-900 transition">{{ $label }}</a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
