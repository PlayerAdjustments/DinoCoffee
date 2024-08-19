<x-cards.card-template >
    <div class="flex items-center mb-4">
        <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8" />
        </svg>
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Notificaciones</h5>
    </div>
    <div
        class="flow-root max-h-96 max-w-full scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-white dark:scrollbar-track-gray-800 overflow-y-auto">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($notifications as $n)
                <a href="{{ route('notification.delete', $n) }}"
                    class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-700  dark:border-gray-600">
                    <div class="flex-shrink-0">
                        <img class="w-11 h-11 rounded-full" src="{{ asset('storage/Notification_Icons/' . $n->icon) }}"
                            alt="{{ $n->icon }}" />
                    </div>
                    <div class="pl-3 w-full">
                        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $n->subject }}</span>:
                            {{ $n->body }}
                        </div>
                        <div class="text-xs font-medium text-primary-600 dark:text-primary-500">
                            {{ $n->created_at->diffForHumans() }}
                        </div>
                    </div>
                </a>
            @endforeach
        </ul>
    </div>
    <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">* Presiona las notificaciones para
        eliminarlas</span>
</x-cards.card-template>
