<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-head />
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        {{$slot}}
    </body>
</html>
