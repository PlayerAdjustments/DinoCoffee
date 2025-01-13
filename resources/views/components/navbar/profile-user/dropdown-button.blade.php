<a href="{{ $url }}" class="py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{$class}}">
    @if($icon)
        <svg class="mr-2 w-5 h-5 {{ $iconbutton ? 'text-gray-400' : '' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            {{!! $icon !!}}
        </svg>
    @endif
    {{ $text }}
    @if($hasarrow)
        <svg class="w-5 h-5 text-gray-400 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
        </svg>
    @endif
</a>
