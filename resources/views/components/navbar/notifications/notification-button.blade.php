{{-- Notifications --}}
<button type="button" data-dropdown-toggle="notification-dropdown"
    class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
    <span class="sr-only">View notifications</span>
    {{-- Bell icon --}}
    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
        </path>
    </svg>
    {{-- Notifications bubble --}}
    @if (count($notifications) > 0)
        <span class="absolute top-[1.2rem] w-[0.6rem] h-[0.6rem] me-2 bg-primary-400 rounded-full"></span>
    @endif
</button>

{{-- Dropdown --}}
<x-navbar.notifications.dropdown :notifications="$notifications" :totalNotifications="$totalNotifications"/>
