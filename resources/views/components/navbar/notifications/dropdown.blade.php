<div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
    id="notification-dropdown">
    <div
        class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
        ({{ $notifications->count() }}/{{ $totalNotifications }}) Notifications
    </div>
    <div>
        @foreach ($notifications as $n)
            <x-navbar.notifications.item :notification="$n" />
        @endforeach

        @if (count($notifications) <= 0)
            <a href="#"
                class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="pl-3 w-full">
                    <div class="text-gray-500 font-normal text-sm text-center mb-1.5 dark:text-gray-400">
                        <span class="font-semibold text-gray-900 dark:text-white">No records</span>
                    </div>
                </div>
            </a>
        @endif
    </div>
    <a href="#"
        class="block px-2 py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
        <div class="inline-flex items-center">
            <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd"
                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                    clip-rule="evenodd"></path>
            </svg>
            @if (count($notifications) > 0)
                Click notification to delete
            @endif
        </div>
    </a>
</div>
