<a href="{{ route('auth.login', $notification) }}"
    class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
    <div class="flex-shrink-0">
        {{-- Notification Icon --}}
        <img class="w-11 h-11 rounded-full" src="{{ \App\Enums\NotificationIcons::from($notification->icon)->getAsset() }}"
            alt="{{ $notification->icon }}" />
        {{-- Green Bubble --}}
        <div
            class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700">
            {{-- Save Box icon --}}
            <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                </path>
                <path
                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                </path>
            </svg>
        </div>
    </div>
    <div class="pl-3 w-full">
        {{-- Notification Subject & Body --}}
        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
            <span class="font-semibold text-gray-900 dark:text-white">{{ $notification->subject }}</span>:
            {{ $notification->body }}
        </div>
        {{-- Notification creation. --}}
        <div class="text-xs font-medium text-primary-600 dark:text-primary-500">
            {{ $notification->created_at->diffForHumans() }}
        </div>
    </div>
</a>
