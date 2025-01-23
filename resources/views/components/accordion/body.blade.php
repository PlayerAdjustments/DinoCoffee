<div id="{{ $id }}" class="hidden" aria-labelledby="{{ $parent }}">
    <div class="p-5 border {{ $positionLast ? 'border-b-1' : 'border-b-0'}} border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 {{ $class }}">
        {{ $slot }}
    </div>
</div>
