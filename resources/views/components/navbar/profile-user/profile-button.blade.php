<button type="button"
    class="flex mx-3 text-sm bg-gray-200  dark:bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
    <span class="sr-only">Open user menu</span>
    <img class="w-8 h-8 rounded-full" src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="user avatar" />
</button>

<x-navbar.profile-user.profile-dropdown :user="$user" />
