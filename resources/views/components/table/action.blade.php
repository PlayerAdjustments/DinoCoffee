@props(['id', 'routes', 'currentData', 'trashed' => $currentData->trashed(), 'params'])

{{-- Dropdown Button --}}
<button id="{{ $id }}-{{ $currentData->id }}-dropdown-button"
    data-dropdown-toggle="{{ $id }}-{{ $currentData->id }}-dropdown"
    class="flex justify-center items-center w-full h-full">
    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
    </svg>
</button>

{{-- Dropdown --}}
<div id="{{ $id }}-{{ $currentData->id }}-dropdown"
    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 divide-gray-100" aria-labelledby="{{ $id }}-{{ $currentData->id }}-dropdown-button">
        @foreach ($routes as $r)
            @if (trim(ucfirst($r['name'])) === 'Show' || trim(ucfirst($r['name'])) === 'Edit')
                <li>
                    <a href="{{ route($r['route'], $r['params']) }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $r['name'] }}</a>
                </li>
            @endif

            @if (trim(ucfirst($r['name'])) === 'Delete')
                <li>
                    <a href="{{ route($r['route'], $r['params']) }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $r['name'] }}</a>
                </li>
            @endif

            @if (trim(ucfirst($r['name'])) === 'Restore' && $currentData->trashed())
                <li>
                    <a href="{{ route($r['route'], $r['params']) }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $r['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
