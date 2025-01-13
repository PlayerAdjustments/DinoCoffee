<nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        {{-- Slot left side --}}
        <div class="flex justify-start items-center">
            {{ $left }}
        </div>
        {{-- Slot right side --}}
        <div class="flex items-center lg:order-2">
            {{ $right }}
        </div>
        {{-- Default slot --}}
        {{$slot}}
    </div>
</nav>
