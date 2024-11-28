<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" integrity="sha384-mqozHMOtx/762srWJnvm5wDYIVNSZw691t+rgXQoo/83uZG6A1aMi23a3fwExvZi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js" integrity="sha384-SwLKRRNiVJqs2wqB+G5yEJfYuFngJWupGEYFq2Z0dK6+9adS+jWPUVTQ/iCYRNu1" crossorigin="anonymous"></script>
    {{-- Dark mode check user preferences --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-200 dark:bg-gray-900">
    <div class="antialiased bg-gray-200 dark:bg-gray-900">te
        <x-developer.navbar />

        <x-developer.sidebar />

        <main class="p-4 md:ml-64 h-full pt-20 bg-gray-200 dark:bg-gray-900">
            {{-- Show messages to user. --}}
            @if ($errors->any() || session()->has('Success') || session()->has('Info'))
                <div class="absolute top-20 right-0 transition-transform overflow-hidden z-40">
                    <ul>
                        {{-- Show errors to user --}}
                        @foreach ($errors->all() as $e)
                            <li>
                                <x-toast type='Error'>
                                    {{ $e }}
                                </x-toast>
                            </li>
                        @endforeach
                        {{-- Show success message to user --}}
                        @if (session()->has('Success'))
                            <li>
                                <x-toast type='Success'>
                                    {{ session('Success') }}
                                </x-toast>
                            </li>
                        @endif
                        {{-- Show info message to user --}}
                        @if (session()->has('Info'))
                            <li>
                                <x-toast type='Info'>
                                    {{ session('Info') }}
                                </x-toast>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
