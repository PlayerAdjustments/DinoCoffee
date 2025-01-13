<!-- Dropdown menu -->
<div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
    id="dropdown">
    <div class="py-3 px-4">
        <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ $user->fullName }}</span>
        <span class="block text-sm text-gray-900 truncate dark:text-white">{{ $user->email }}</span>
    </div>
    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
        {{-- Buttons without icons --}}
        <li>
            <x-navbar.profile-user.dropdown-button url="{{ route('dashboard.main', $user->matricula) }}" text="My profile" functional="true" />
        </li>
        <li>
            <x-navbar.profile-user.dropdown-button url="{{ route('dashboard.main') }}" text="Account settings" />
        </li>
    </ul>
    <ul class="py-1 text-gray-700 dark:text-gray-300 hidden" aria-labelledby="dropdown">
        {{-- Examples of buttons with icons and arrow --}}
        <x-navbar.profile-user.dropdown-button url="{{ route('dashboard.main', $user->matricula) }}" text="My likes"
            icon='<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>'
            iconbutton="true" />
        <x-navbar.profile-user.dropdown-button url="{{ route('dashboard.main', $user->matricula) }}" text="Collections"
            icon='<path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>'
            iconbutton="true" hasarrow="true" />
    </ul>
    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
        <li>
            <a href="{{ route('auth.logout') }}"
                class="block py-2 px-4 rounded-b-xl text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                out</a>
        </li>
    </ul>
</div>
