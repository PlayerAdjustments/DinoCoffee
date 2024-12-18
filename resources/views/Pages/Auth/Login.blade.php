<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

<body class="bg-gray-50 dark:bg-gray-900">
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

    <section class="flex h-screen">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md  dark:bg-gray-800 dark:border-gray-700 pt-4">
                <a href="#"
                    class="flex items-center mb-0 text-2xl font-semibold text-gray-900 dark:text-white justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 370 97.83"
                        class="w-60 h-auto">
                        <path
                            d="M49.99 0C29 0 11.95 17.06 11.95 38.04c0 6.87 1.86 13.62 5.4 19.51 1.48-.38 2.97-.71 4.48-1-3.5-5.31-5.53-11.67-5.53-18.53 0-18.63 15.06-33.7 33.7-33.7s33.7 15.06 33.7 33.7c0 6.58-1.92 13.02-5.53 18.53 1.51.29 3 .62 4.49 1 3.54-5.89 5.4-12.64 5.4-19.51C88.06 17.06 71 0 50.02 0M36.41 39.13c-2.7 0-4.89 2.18-4.89 4.88 0 2.7 2.18 4.89 4.88 4.89 2.7 0 4.89-2.18 4.89-4.88 0-2.7-2.18-4.89-4.88-4.89m27.17 0c-2.7 0-4.89 2.18-4.89 4.88 0 2.7 2.18 4.89 4.88 4.89 2.7 0 4.89-2.18 4.89-4.88a4.9 4.9 0 0 0-4.89-4.9M32.25 59.78c-8.94.03-17.86 2.3-26.7 6.73l-1.2.6V75c1.38-.58 2.85-.93 4.35-1.04v-4.09c7.91-3.77 15.75-5.71 23.57-5.74l-.02-4.34Zm.01 0v4.35c5.17-.02 10.34.88 15.55 2.49v31.21h4.35V66.62c5.2-1.61 10.38-2.51 15.55-2.49v-4.35c-5.92-.02-11.85.96-17.73 2.87-5.89-1.92-11.81-2.89-17.73-2.87h.01Zm35.47 0v4.35c7.82.03 15.66 1.96 23.57 5.74v4.09c1.5.12 2.96.47 4.35 1.06v-7.9l-1.2-.6c-8.84-4.43-17.76-6.7-26.71-6.73h-.01v-.01ZM9.79 78.26C4.41 78.26 0 82.67 0 88.05s4.41 9.79 9.79 9.79 9.79-4.41 9.79-9.79c-.01-5.38-4.41-9.79-9.79-9.79m80.42 0c-5.38 0-9.79 4.41-9.79 9.79s4.41 9.79 9.79 9.79 9.79-4.41 9.79-9.79-4.41-9.79-9.79-9.79M9.79 82.61a5.403 5.403 0 0 1 5.44 5.36v.07c.02 2.98-2.38 5.42-5.36 5.43H9.8a5.403 5.403 0 0 1-5.44-5.36v-.07a5.403 5.403 0 0 1 5.36-5.44h.07m80.42.01a5.403 5.403 0 0 1 5.44 5.36v.07c0 3.03-2.4 5.43-5.44 5.43s-5.43-2.4-5.43-5.43a5.403 5.403 0 0 1 5.36-5.44h.07"
                            class="fill-secondary-800 stroke-0" />
                        <path
                            d="M126.84 49.85c-2.18-1.12-3.86-2.71-5.06-4.77-1.19-2.06-1.79-4.46-1.79-7.2V18.72h6.98v19.16c0 1.88.41 3.39 1.21 4.53.81 1.13 1.78 1.94 2.91 2.41 1.13.47 2.26.71 3.38.71 1.09 0 2.2-.24 3.33-.71s2.1-1.27 2.89-2.41c.79-1.13 1.19-2.64 1.19-4.53V18.72h6.98v19.16c0 2.74-.59 5.14-1.77 7.2s-2.86 3.65-5.03 4.77-4.71 1.68-7.59 1.68c-2.91 0-5.46-.56-7.64-1.68Zm49.3-20.93c1.52 1.8 2.27 4.36 2.27 7.68v14.35h-6.76V36.6c0-3.27-1.56-4.9-4.68-4.9-1.21 0-2.3.48-3.27 1.43s-1.43 2.61-1.37 4.97v12.85h-6.58V26.67h6.58v2.16c.79-.79 1.8-1.43 3-1.9 1.21-.47 2.37-.71 3.49-.71 3.36 0 5.79.9 7.31 2.69Zm14.9-5.85c-.71.69-1.56 1.04-2.56 1.04s-1.91-.35-2.63-1.04c-.72-.69-1.08-1.54-1.08-2.54 0-.97.36-1.8 1.08-2.49.72-.69 1.6-1.04 2.63-1.04 1 0 1.85.35 2.56 1.04.71.69 1.06 1.52 1.06 2.49 0 1-.35 1.85-1.06 2.54Zm-5.87 3.64h6.62v24.24h-6.62V26.71Zm47.38 24.24h-7.02V35.54l-9.89 11.48-9.89-11.48v15.41h-7.02V17.66l16.91 19.07 16.91-19.08v33.29Zm12.43-1.12a12.802 12.802 0 0 1-4.79-4.62c-1.18-1.94-1.77-4.06-1.77-6.36 0-2.27.59-4.37 1.77-6.31 1.18-1.94 2.77-3.48 4.79-4.61 2.02-1.13 4.22-1.7 6.6-1.7 2.39 0 4.59.57 6.62 1.7 2.03 1.13 3.64 2.67 4.83 4.61a11.87 11.87 0 0 1 1.79 6.31c0 2.3-.6 4.42-1.79 6.36-1.19 1.94-2.8 3.48-4.83 4.61s-4.24 1.7-6.62 1.7-4.58-.57-6.6-1.7Zm3.24-16.91c-1.03.6-1.84 1.43-2.43 2.47-.59 1.04-.88 2.2-.88 3.47 0 1.32.29 2.51.86 3.56s1.37 1.87 2.38 2.47c1.02.6 2.16.9 3.42.9 1.24 0 2.36-.3 3.38-.9 1.02-.6 1.82-1.43 2.41-2.49.59-1.06.88-2.24.88-3.53 0-1.27-.29-2.42-.88-3.47a6.498 6.498 0 0 0-2.41-2.47c-1.02-.6-2.14-.9-3.38-.91-1.21 0-2.33.3-3.36.91Zm40.4 15.61c-.56.77-1.52 1.45-2.89 2.05-1.37.6-2.86.91-4.48.9-2.5 0-4.67-.56-6.51-1.68s-3.24-2.64-4.22-4.57c-.97-1.93-1.46-4.07-1.46-6.42s.49-4.5 1.46-6.42c.97-1.93 2.38-3.45 4.22-4.57s4.01-1.68 6.51-1.68c1.68 0 3.16.29 4.44.86 1.28.57 2.26 1.3 2.94 2.19V17.58h6.54v33.38h-6.54v-2.43Zm-1.54-14.68c-1.21-1.28-2.83-1.92-4.86-1.92s-3.69.64-4.88 1.92c-1.19 1.28-1.79 2.94-1.79 4.97 0 1.97.61 3.61 1.83 4.9s2.83 1.94 4.83 1.94 3.69-.61 4.88-1.83c1.19-1.22 1.79-2.89 1.79-5.01 0-2.03-.6-3.69-1.81-4.97Zm20.82 16.53c-2.02-.79-3.75-2.14-5.19-4.04-1.44-1.9-2.16-4.38-2.16-7.44s.73-5.53 2.18-7.42c1.46-1.88 3.2-3.22 5.23-4.02 2.03-.8 3.96-1.19 5.78-1.19 2.12 0 4.14.47 6.05 1.41 1.91.94 3.48 2.33 4.7 4.15 1.22 1.82 1.86 3.99 1.92 6.49 0 .77-.01 1.43-.04 1.99s-.06.91-.09 1.06h-19.16c.35 1.71 1.24 2.87 2.65 3.49s2.74.93 3.97.93c1.59 0 2.86-.29 3.8-.86s1.75-1.23 2.43-1.97l5.12 2.96c-2.77 3.77-6.55 5.65-11.35 5.65-1.88 0-3.83-.4-5.85-1.19Zm1.34-16.98c-1.15.9-1.8 1.99-1.94 3.29h12.14c-.09-.77-.38-1.5-.88-2.21s-1.17-1.29-2.01-1.74c-.84-.46-1.79-.68-2.85-.68-1.83 0-3.31.45-4.46 1.35Zm22.57-15.83h6.62v33.38h-6.62V17.57Zm18.34 32.26a12.852 12.852 0 0 1-4.79-4.61c-1.18-1.94-1.77-4.06-1.77-6.36 0-2.27.59-4.37 1.77-6.31 1.18-1.94 2.77-3.48 4.79-4.61s4.22-1.7 6.6-1.7c2.39 0 4.59.57 6.62 1.7 2.03 1.13 3.64 2.67 4.83 4.61a11.87 11.87 0 0 1 1.79 6.31c0 2.3-.6 4.42-1.79 6.36-1.19 1.94-2.8 3.48-4.83 4.61-2.03 1.13-4.24 1.7-6.62 1.7s-4.58-.57-6.6-1.7Zm3.25-16.91c-1.03.6-1.84 1.43-2.43 2.47-.59 1.04-.88 2.2-.88 3.47 0 1.32.29 2.51.86 3.56a6.308 6.308 0 0 0 2.39 2.47c1.02.6 2.16.9 3.42.9 1.24 0 2.36-.3 3.38-.9 1.02-.6 1.82-1.43 2.41-2.49s.88-2.24.88-3.53c0-1.27-.29-2.42-.88-3.47s-1.39-1.87-2.41-2.47c-1.02-.6-2.14-.9-3.38-.91-1.21 0-2.33.3-3.36.91Z"
                            class="fill-primary-950 stroke-0 dark:fill-primary-50" />
                        <path
                            d="M122.21 78.65c.53.21 1.01.32 1.45.32s.83-.09 1.1-.27.41-.39.41-.64c0-.2-.08-.36-.24-.49-.16-.13-.36-.22-.61-.28s-.57-.13-.97-.21c-.53-.09-1.02-.2-1.47-.35-.45-.14-.85-.39-1.21-.74s-.55-.82-.55-1.41c0-.88.32-1.51.96-1.89s1.4-.57 2.27-.57c.67 0 1.25.09 1.74.27.49.18.99.45 1.48.82l-.98 1.34a4.83 4.83 0 0 0-1.14-.61c-.39-.15-.78-.22-1.17-.22-.34 0-.66.06-.96.18-.3.12-.45.33-.45.62 0 .18.08.32.23.43.15.11.32.19.5.23.18.05.48.12.89.21l.4.08c.62.12 1.13.25 1.53.39.4.14.76.39 1.05.73s.45.82.44 1.43c0 .82-.29 1.45-.87 1.88-.58.43-1.37.65-2.37.64-1.46 0-2.68-.42-3.68-1.27l.94-1.35c.32.27.74.51 1.27.72Zm12.47 1.75v-8.14h1.76v8.14h-1.76Zm11.83-1.75c.53.21 1.01.32 1.45.32s.83-.09 1.1-.27.41-.39.41-.64c0-.2-.08-.36-.24-.49s-.36-.22-.61-.28c-.24-.06-.57-.13-.97-.21-.53-.09-1.02-.2-1.47-.35-.45-.14-.85-.39-1.21-.74s-.54-.82-.55-1.41c0-.88.32-1.51.96-1.89s1.4-.57 2.27-.57c.67 0 1.25.09 1.74.27.49.18.99.45 1.48.82l-.98 1.34a4.83 4.83 0 0 0-1.14-.61c-.39-.15-.78-.22-1.17-.22-.34 0-.66.06-.96.18s-.45.33-.45.62c0 .18.08.32.23.43s.32.19.5.23c.18.05.48.12.88.21l.4.08c.62.12 1.13.25 1.53.39.4.14.76.39 1.05.73s.45.82.45 1.43c0 .82-.29 1.45-.88 1.88-.58.43-1.37.65-2.37.64-1.46 0-2.68-.42-3.68-1.27l.94-1.35c.32.27.74.51 1.27.72Zm15.33-4.87v6.62h-1.77v-6.62h-2.37v-1.53h6.5v1.53h-2.36Zm11.43 1.82h3.9v1.54h-3.9v1.74h4.41v1.53h-6.17v-8.14h6.17v1.53h-4.41v1.81Zm20.55 4.8h-1.77v-3.89l-2.49 2.89-2.49-2.89v3.89h-1.77V72l4.26 4.81 4.26-4.81v8.4Zm11.67-8.4 4.47 8.4h-1.93l-.65-1.25h-3.8l-.62 1.25h-1.94l4.47-8.4Zm1.05 5.65-1.05-2.13-1.04 2.13h2.08Zm21.95 2.34c-.67-.38-1.2-.89-1.59-1.54a4.06 4.06 0 0 1-.59-2.12c0-.76.2-1.46.59-2.11.39-.65.92-1.16 1.59-1.54s1.4-.57 2.19-.57 1.53.19 2.21.57c.68.38 1.21.89 1.6 1.54.39.65.59 1.35.59 2.11s-.2 1.47-.59 2.12c-.39.65-.93 1.16-1.6 1.54-.68.38-1.41.57-2.21.57-.79 0-1.53-.19-2.19-.57Zm.88-5.92c-.4.24-.72.56-.96.96-.24.4-.36.83-.36 1.29 0 .46.12.89.36 1.3.24.4.56.73.96.97a2.518 2.518 0 0 0 2.63 0c.41-.25.73-.57.96-.97.23-.4.35-.84.35-1.3s-.12-.89-.35-1.29a2.6 2.6 0 0 0-.96-.96c-.4-.24-.84-.36-1.32-.36-.48 0-.91.12-1.31.36Zm17.11 3.24v3.08h-1.76v-3.08l-3.21-5.05h2.06l2.03 3.29 2.05-3.29h2.06l-3.23 5.05Zm12.09-1.71h3.9v1.54h-3.9v1.74h4.41v1.53h-6.17v-8.14h6.17v1.53h-4.41v1.81Zm14.04 4.8h-1.75V72l5.61 4.97v-4.7h1.76v8.39l-5.62-4.89v4.63Zm17.12-6.62v6.62h-1.77v-6.62h-2.37v-1.53h6.5v1.53h-2.36Zm11.43 1.82h3.9v1.54h-3.9v1.74h4.41v1.53h-6.17v-8.14h6.17v1.53h-4.41v1.81Zm14.13 3.06c.53.21 1.01.32 1.45.32s.83-.09 1.1-.27c.27-.18.41-.39.41-.64 0-.2-.08-.36-.24-.49-.16-.13-.36-.22-.61-.28s-.57-.13-.97-.21c-.53-.09-1.02-.2-1.47-.35s-.85-.39-1.21-.74-.54-.82-.55-1.41c0-.88.32-1.51.96-1.89.64-.38 1.4-.57 2.27-.57.67 0 1.25.09 1.74.27.49.18.99.45 1.48.82l-.98 1.34a4.83 4.83 0 0 0-1.14-.61c-.39-.15-.78-.22-1.17-.22-.34 0-.66.06-.96.18-.3.12-.45.33-.45.62 0 .18.08.32.23.43s.32.19.5.23.48.12.89.21l.4.08c.62.12 1.13.25 1.53.39.4.14.76.39 1.05.73.3.34.45.82.45 1.43 0 .82-.29 1.45-.87 1.88-.58.43-1.37.65-2.37.64-1.46 0-2.68-.42-3.67-1.27l.93-1.35c.32.27.74.51 1.27.72Z"
                            class="fill-secondary-800 stroke-0" />
                    </svg>
                </a>
                <div class="px-6 pb-8 pt-2  space-y-4 md:space-y-6 sm:px-8 sm:pb-8 sm:pt-2">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Ingresa a tu cuenta
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('auth.login') }}" method="POST">
                        {{-- CSRF Token that allows form only to be answered in this website. Must be on all forms --}}
                        @csrf
                        <div>
                            <label for="matricula"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tu
                                matricula</label>
                            <input type="matricula" name="matricula" id="matricula"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="15221669" value="{{ old('matricula') }}" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input type="hidden" name="remember" value="0">
                                    <input id="remember" name="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        value="1" />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">¿Olvidaste
                                tu contraseña?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Ingresar</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="#"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
