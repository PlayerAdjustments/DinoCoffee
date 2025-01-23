<h2 id="{{ $id }}">
    <button
        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border {{$positionLast ? 'border-b-1' : 'border-b-0'}} border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 {{ $class }}"
        data-accordion-target="#{{ $target }}" aria-expanded="true" aria-controls="{{ $target }}">
        <span class="flex items-center">
            @if ($icon)
                <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="{{ $viewbox ? $viewbox : '0 0 20 20' }}"
                    xmlns="http://www.w3.org/2000/svg">
                    {!! $icon !!}
                </svg>
            @endif
            {{ $text }}
        </span>
        @if ($arrow)
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        @endif
    </button>
</h2>
