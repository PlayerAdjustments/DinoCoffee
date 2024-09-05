@extends('Layouts.Developer.Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 justify-between">
        {{-- Contact information --}}
        <div>
            <x-cards.card-template>
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true" width="32" height="32"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM208 288l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                    </svg>
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información de contacto</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <button id="email_clipboard_button" data-copy-to-clipboard-target="user_email_paragraph"
                                        data-tooltip-target="tooltip-copy-user-email-button"
                                        class="end-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 rounded-lg p-2 inline-flex items-center justify-center">
                                        <span id="default-email-icon">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 16">
                                                <path
                                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                <path
                                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                            </svg>
                                        </span>
                                        <span id="email-success-icon" class="hidden inline-flex items-center">
                                            <svg class="w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div id="tooltip-copy-user-email-button" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <span id="default-email-tooltip-message">Copy email</span>
                                        <span id="success-email-tooltip-message" class="hidden">Copied!</span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0 ms-2 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Correo electrónico
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $career->coordinadorObj->email }}
                                    </p>
                                    <input id="user_email_paragraph" type="text"
                                        value="{{ $career->coordinadorObj->email }}" class="hidden" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <button id="phone_clipboard_button" data-copy-to-clipboard-target="user_phone_paragraph"
                                        data-tooltip-target="tooltip-copy-user-phone-button"
                                        class="end-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 rounded-lg p-2 inline-flex items-center justify-center">
                                        <span id="default-phone-icon">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                                            </svg>
                                        </span>
                                        <span id="phone-success-icon" class="hidden inline-flex items-center">
                                            <svg class="w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div id="tooltip-copy-user-phone-button" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <span id="default-phone-tooltip-message">Copy phone</span>
                                        <span id="success-phone-tooltip-message" class="hidden">Copied!</span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0 ms-2 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Número celular
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $career->coordinadorObj->phone_number }}
                                    </p>
                                    <input id="user_phone_paragraph" type="text"
                                        value="{{ $career->coordinadorObj->phone_number }}" class="hidden" readonly>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">* Presiona los iconos para
                        copiar la información</span>
                </div>
            </x-cards.card-template>
        </div>
        {{-- Main Career card --}}
        <div>
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown-editCareer"
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-editCareer"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('developer.careers.edit', $career) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                    Data</a>
                            </li>
                            @if ($career->trashed())
                                <li>
                                    <form action="{{ route('developer.careers.restore', $career) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Restore</button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <form action="{{ route('developer.careers.destroy', $career) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Delete</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div class="w-24 h-24 mb-3 text-{{ $career->color }}-800 dark:text-{{ $career->color }}-300">
                        @switch($career->abbreviation)
                            @case('DTS')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M64 96c0-35.3 28.7-64 64-64l384 0c35.3 0 64 28.7 64 64l0 256-64 0 0-256L128 96l0 256-64 0L64 96zM0 403.2C0 392.6 8.6 384 19.2 384l601.6 0c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8L76.8 480C34.4 480 0 445.6 0 403.2zM281 209l-31 31 31 31c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-48-48c-9.4-9.4-9.4-24.6 0-33.9l48-48c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM393 175l48 48c9.4 9.4 9.4 24.6 0 33.9l-48 48c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l31-31-31-31c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z" />
                                </svg>
                            @break

                            @case('IEP')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M528.3 61.3c-11.4-42.7-55.3-68-98-56.6L414.9 8.8C397.8 13.4 387.7 31 392.3 48l24.5 91.4L308.5 167.5l-6.3-18.1C297.7 136.6 285.6 128 272 128s-25.7 8.6-30.2 21.4l-13.6 39L96 222.6 96 184c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 264-16 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l512 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-137.3 0L340 257.5l-62.2 16.1L305.3 352l-66.6 0L265 277l-74.6 19.3L137.3 448 96 448l0-159.2 337.4-87.5 25.2 94c4.6 17.1 22.1 27.2 39.2 22.6l15.5-4.1c42.7-11.4 68-55.3 56.6-98L528.3 61.3zM205.1 448l11.2-32 111.4 0 11.2 32-133.8 0z" />
                                </svg>
                            @break

                            @case('IAM')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M171.3 96L224 96l0 96-112.7 0 30.4-75.9C146.5 104 158.2 96 171.3 96zM272 192l0-96 81.2 0c9.7 0 18.9 4.4 25 12l67.2 84L272 192zm256.2 1L428.2 68c-18.2-22.8-45.8-36-75-36L171.3 32c-39.3 0-74.6 23.9-89.1 60.3L40.6 196.4C16.8 205.8 0 228.9 0 256L0 368c0 17.7 14.3 32 32 32l33.3 0c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80l130.7 0c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80l33.3 0c17.7 0 32-14.3 32-32l0-48c0-65.2-48.8-119-111.8-127zM434.7 368a48 48 0 1 1 90.5 32 48 48 0 1 1 -90.5-32zM160 336a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg>
                            @break

                            @case('IMK')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M320 0c17.7 0 32 14.3 32 32l0 64 120 0c39.8 0 72 32.2 72 72l0 272c0 39.8-32.2 72-72 72l-304 0c-39.8 0-72-32.2-72-72l0-272c0-39.8 32.2-72 72-72l120 0 0-64c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224l16 0 0 192-16 0c-26.5 0-48-21.5-48-48l0-96c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-16 0 0-192 16 0z" />
                                </svg>
                            @break

                            @case('IBM')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M483.2 9.6L524 64l92 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-104 0c-7.6 0-14.7-3.6-19.2-9.6L468.7 70.3l-47 99.9c-3.7 7.8-11.3 13.1-19.9 13.7s-16.9-3.4-21.7-10.6L339.2 112 216 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l136 0c8 0 15.5 4 20 10.7l24.4 36.6 45.9-97.5C445.9 6.2 453.2 1 461.6 .1s16.6 2.7 21.6 9.5zM320 160l12.7 0 20.7 31.1c11.2 16.8 30.6 26.3 50.7 24.8s37.9-13.7 46.5-32L461.9 160l82.1 0c53 0 96 43 96 96l0 224c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32-224 0-32 0L64 448l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32L0 96C0 78.3 14.3 64 32 64s32 14.3 32 32l0 256 224 0 0-160c0-17.7 14.3-32 32-32zm-144 0a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                                </svg>
                            @break

                            @case('IIL')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z" />
                                </svg>
                            @break

                            @default
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full me-1.5" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 512 512">
                                    <path
                                        d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152l0 264-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427L0 224c0-17.7 14.3-32 32-32l30.3 0c63.6 0 125.6 19.6 177.7 56zm32 264l0-264c52.1-36.4 114.1-56 177.7-56l30.3 0c17.7 0 32 14.3 32 32l0 203c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z" />
                                </svg>
                            @break
                        @endswitch
                    </div>

                    <h5 class="mb-1 text-xl px-4 font-medium text-gray-900 dark:text-white text-center">{{ $career->name }}
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400 text-center">
                        {{ $career->schoolObj->name }}</span>
                    {{-- Showing school tag -> career tag --}}
                    <div class="mt-4 text-gray-800 inline-flex dark:text-white">
                        <a href="{{ route('developer.schools.show', $career->schoolObj->abbreviation) }}"
                            class="inline-flex hover:scale-110">
                            <x-badges.schoolbadge :type="$career->schoolObj->abbreviation" :color="$career->schoolObj->color" />
                            <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>
                            <x-badges.careerbadge :type="$career->abbreviation" :color="$career->color" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Coordinator's information --}}
        <div>
            <x-cards.card-template>
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <path
                            d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                    </svg>

                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información del coordinador
                    </h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <a class="flex items-center"
                                href="{{ route('developer.users.show', $career->coordinadorObj->matricula) }}">
                                <div class="flex-shrink-0">
                                    <x-badges.rolebadge :role="$career->coordinadorObj->role" />
                                </div>
                                <div class="flex-1 min-w-0 ms-2 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Nombre completo
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $career->coordinadorObj->fullname }}
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <button id="matricula_clipboard_button"
                                        data-copy-to-clipboard-target="user_matricula_paragraph"
                                        data-tooltip-target="tooltip-copy-user-matricula-button"
                                        class="end-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 rounded-lg p-2 inline-flex items-center justify-center">
                                        <span id="default-matricula-icon">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span id="matricula-success-icon" class="hidden inline-flex items-center">
                                            <svg class="w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5.917 5.724 10.5 15 1.5" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div id="tooltip-copy-user-matricula-button" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <span id="default-matricula-tooltip-message">Copy matricula</span>
                                        <span id="success-matricula-tooltip-message" class="hidden">Copied!</span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0 ms-2 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Matricula
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $career->coordinadorObj->matricula }}
                                    </p>
                                    <input id="user_matricula_paragraph" type="text"
                                        value="{{ $career->coordinadorObj->matricula }}" class="hidden" readonly>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">* Presiona los iconos para
                        copiar la información</span>
                </div>
            </x-cards.card-template>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 justify-between">
        <x-cards.list-career-codes :career="$career->abbreviation" />

        <x-cards.card-template>

            {{-- Card Icon and Title --}}
            <div class="flex items-center mb-4">

                <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M384 480l48 0c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224l-400 0c-11.4 0-21.9 6-27.6 15.9L48 357.1 48 96c0-8.8 7.2-16 16-16l117.5 0c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8L416 144c8.8 0 16 7.2 16 16l0 32 48 0 0-32c0-35.3-28.7-64-64-64L298.5 96c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l23.7 0L384 480z" />
                </svg>

                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Planes de estudio</h5>
            </div>

            {{-- Main List --}}
            <div
                class="flow-root max-h-96 max-w-full scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-white dark:scrollbar-track-gray-800 overflow-y-auto">
                {{-- Listing StudyPlans --}}
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($career->careerCodes as $cc)
                        @foreach ($cc->studyPlans as $sp)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    {{-- Brief StudyPlan information --}}
                                    @if ($sp->trashed())
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-red-900 truncate dark:text-red-400">
                                                {{ $sp->code }}
                                            </p>
                                            <p class="text-sm text-red-500 truncate dark:text-red-300">
                                                {{ $sp->career_code }} ({{ $sp->semester_duration }} Semestres)
                                            </p>
                                        </div>
                                    @else
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $sp->code }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $sp->career_code }} ({{ $sp->semester_duration }} Semestres)
                                            </p>
                                        </div>
                                    @endif

                                    {{-- Action Buttons --}}
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button id="{{ $sp->slug }}-dropdown-button"
                                            data-dropdown-toggle="{{ $sp->slug }}-dropdown"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- Action Dropdown --}}
                                    <div id="{{ $sp->slug }}-dropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $sp->slug }}-dropdown-button">
                                            <li>
                                                <a href="{{ route('developer.users.show', $sp) }}"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('developer.users.edit', $sp) }}"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('developer.users.edit', $sp) }}"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rename</a>
                                            </li>
                                        </ul>
                                        @if ($sp->trashed())
                                            <div class="py-1">
                                                <form action="{{ route('developer.studyplans.restore', $sp) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit"
                                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Restore</button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="py-1">
                                                <form action="{{ route('developer.studyplans.destroy', $sp) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Delete</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>

            </div>


            {{-- Create StudyPlan Button --}}
            <div data-modal-target="studyPlan-create-modal" data-modal-toggle="studyPlan-create-modal"
                class="pt-2 w-full border-t border-gray-200 dark:border-gray-700 item-start">
                <button type="submit"
                    class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Crear
                </button>
            </div>

        </x-cards.card-template>
    </div>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
    <div class="grid grid-cols-2 gap-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
    </div>

    <script>
        /**
         * Get email Clipboard button and show message.
         */
        const emailClipboardButton = document.getElementById('email_clipboard_button');
        const $defaultEmailIcon = document.getElementById('default-email-icon');
        const $emailSuccessIcon = document.getElementById('email-success-icon');

        const $defaultEmailTooltipMessage = document.getElementById('default-email-tooltip-message');
        const $successEmailTooltipMessage = document.getElementById('success-email-tooltip-message');

        const $emailClipboardTooltip = document.getElementById('tooltip-copy-user-email-button');

        emailClipboardButton.onclick = function() {
            showEmailSuccess();
            setTimeout(() => {
                resetEmailToDefault();
            }, 2000);
        }

        const showEmailSuccess = () => {
            $defaultEmailIcon.classList.add('hidden');
            $emailSuccessIcon.classList.remove('hidden');
            $defaultEmailTooltipMessage.classList.add('hidden');
            $successEmailTooltipMessage.classList.remove('hidden');
        }

        const resetEmailToDefault = () => {
            $defaultEmailIcon.classList.remove('hidden');
            $emailSuccessIcon.classList.add('hidden');
            $defaultEmailTooltipMessage.classList.remove('hidden');
            $successEmailTooltipMessage.classList.add('hidden');
            $emailClipboardTooltip.classList.add('hidden');
        }

        /**
         * Get phone Clipboard button and show message
         */
        const phoneClipboardButton = document.getElementById('phone_clipboard_button');
        const $defaultPhoneIcon = document.getElementById('default-phone-icon');
        const $phoneSuccessIcon = document.getElementById('phone-success-icon');

        const $defaultPhoneTooltipMessage = document.getElementById('default-phone-tooltip-message');
        const $successPhoneTooltipMessage = document.getElementById('success-phone-tooltip-message');

        const $phoneClipboardTooltip = document.getElementById('tooltip-copy-user-phone-button');

        phoneClipboardButton.onclick = function() {
            showPhoneSuccess();
            setTimeout(() => {
                resetPhoneToDefault();
            }, 2000);
        }

        const showPhoneSuccess = () => {
            $defaultPhoneIcon.classList.add('hidden');
            $phoneSuccessIcon.classList.remove('hidden');
            $defaultPhoneTooltipMessage.classList.add('hidden');
            $successPhoneTooltipMessage.classList.remove('hidden');
        }

        const resetPhoneToDefault = () => {
            $defaultPhoneIcon.classList.remove('hidden');
            $phoneSuccessIcon.classList.add('hidden');
            $defaultPhoneTooltipMessage.classList.remove('hidden');
            $successPhoneTooltipMessage.classList.add('hidden');
            $phoneClipboardTooltip.classList.add('hidden');
        }

        /**
         * Get matricula Clipboard button and show message
         */
        const matriculaClipboardButton = document.getElementById('matricula_clipboard_button');
        const $defaultmatriculaIcon = document.getElementById('default-matricula-icon');
        const $matriculaSuccessIcon = document.getElementById('matricula-success-icon');

        const $defaultmatriculaTooltipMessage = document.getElementById('default-matricula-tooltip-message');
        const $successmatriculaTooltipMessage = document.getElementById('success-matricula-tooltip-message');

        const $matriculaClipboardTooltip = document.getElementById('tooltip-copy-user-matricula-button');

        matriculaClipboardButton.onclick = function() {
            showmatriculaSuccess();
            setTimeout(() => {
                resetmatriculaToDefault();
            }, 2000);
        }

        const showmatriculaSuccess = () => {
            $defaultmatriculaIcon.classList.add('hidden');
            $matriculaSuccessIcon.classList.remove('hidden');
            $defaultmatriculaTooltipMessage.classList.add('hidden');
            $successmatriculaTooltipMessage.classList.remove('hidden');
        }

        const resetmatriculaToDefault = () => {
            $defaultmatriculaIcon.classList.remove('hidden');
            $matriculaSuccessIcon.classList.add('hidden');
            $defaultmatriculaTooltipMessage.classList.remove('hidden');
            $successmatriculaTooltipMessage.classList.add('hidden');
            $matriculaClipboardTooltip.classList.add('hidden');
        }
    </script>
@endsection
