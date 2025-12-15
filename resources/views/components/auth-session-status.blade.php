@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'p-4 rounded-lg bg-green-50 border border-green-200']) }}>
        <div class="flex items-start">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <p class="ml-3 text-sm text-green-800 font-medium">{{ $status }}</p>
        </div>
    </div>
@endif