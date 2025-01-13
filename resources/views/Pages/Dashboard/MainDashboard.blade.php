<x-layouts.dashboard>
    <x-navbar >
        <x-slot:left>
            <x-navbar.toggle-sidebar />
            <x-navbar.logo />
            <x-navbar.search-bar functional={{true}} />
        </x-slot>
        <x-slot:right>
            <x-navbar.theme-toggle />
            <x-navbar.notifications.notification-button functional={{true}} />
            {{-- Notifications --}}
            {{-- Apps --}}
            {{-- User Profile --}}
        </x-slot>
    </x-navbar>


</x-layouts.dashboard>
