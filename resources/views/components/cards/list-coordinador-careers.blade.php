{{--  Shows the careers that the current user is leading --}}
@if (count($careers) > 0)
    <div
        class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Coordinador actual de:</h5>
        </div>
        <div
            class="flow-root max-h-96 max-w-full scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-white dark:scrollbar-track-gray-800 overflow-y-auto">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($careers as $c)
                    <li class="py-3 sm:py-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <a class="flex items-center" href="{{ route('developer.careers.show', $c) }}">
                            <div class="flex-shrink-0">
                                <x-badges.careerbadge :type="$c->abbreviation" :color="$c->color" />
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $c->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Universidad Modelo, campus Mérida.
                                </p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
