<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <x-alerts.alerts-manager />
    {{ $slot }}
</body>

</html>
