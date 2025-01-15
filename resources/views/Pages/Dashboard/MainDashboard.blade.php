<x-layouts.dashboard>
    <x-navbar >
        <x-slot:left>
            <x-navbar.toggle-sidebar />
            <x-navbar.logo />
            <x-navbar.search-bar functional="true" />
        </x-slot>
        <x-slot:right>
            <x-navbar.theme-toggle />
            <x-navbar.notifications.notification-button functional="true" />
            <x-navbar.apps.app-button functional="true" />
            <x-navbar.profile-user.profile-button />
            {{-- User Profile --}}
        </x-slot>
    </x-navbar>

    <x-sidebar>
        <x-sidebar.footer :functional="true" />
    </x-sidebar>

</x-layouts.dashboard>
