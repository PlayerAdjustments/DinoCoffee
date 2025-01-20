<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <x-head />
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <x-alerts.alerts-manager />

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

    <main class="p-4 md:ml-64 h-auto pt-20">
        {{ $slot }}
    </main>
</body>

</html>
