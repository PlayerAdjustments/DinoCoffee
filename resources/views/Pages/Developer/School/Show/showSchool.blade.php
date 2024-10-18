@extends('Layouts.Developer.Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4 justify-between">
        {{-- School information --}}
        <div>
            <x-cards.card-template>
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true" width="32" height="32"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path
                            d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z" />
                    </svg>
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información de la escuela</h5>
                </div>
                <div class="flow-root">
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
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
                                        {{ $school->created_at }}
                                    </p>
                                    <input id="user_email_paragraph" type="text" value="{{ $school->email }}"
                                        class="hidden" readonly>
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
                                        {{ $school->created_at }}
                                    </p>
                                    <input id="user_phone_paragraph" type="text" value="{{ $school->phone_number }}"
                                        class="hidden" readonly>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">* Presiona los iconos para
                        copiar la información</span>
                </div>
            </x-cards.card-template>
        </div>
        {{-- Main school card --}}
        <div>
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown-editSchool"
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
                    <div id="dropdown-editSchool"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('developer.schools.edit', $school) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                    Data</a>
                            </li>
                            @if ($school->trashed())
                                <li>
                                    <form action="{{ route('developer.schools.restore', $school) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Restore</button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <form action="{{ route('developer.schools.destroy', $school) }}" method="POST">
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
                    <div class="w-24 h-24 mb-3 text-{{ $school->color }}-800 dark:text-{{ $school->color }}-300">
                        {{-- TODO: We must change this to a new system, so we let the user select the logo for their school --}}
                        @switch($school->abbreviation)
                            @case('ING')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                </svg>
                            @break

                            @case('DIS')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M512 256c0 .9 0 1.8 0 2.7c-.4 36.5-33.6 61.3-70.1 61.3L344 320c-26.5 0-48 21.5-48 48c0 3.4 .4 6.7 1 9.9c2.1 10.2 6.5 20 10.8 29.9c6.1 13.8 12.1 27.5 12.1 42c0 31.8-21.6 60.7-53.4 62c-3.5 .1-7 .2-10.6 .2C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                                </svg>
                            @break

                            @case('HUM')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            @break

                            @case('ARQ')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M0 96C0 78.3 14.3 64 32 64l512 0c17.7 0 32 14.3 32 32l0 35.6c0 15.7-12.7 28.4-28.4 28.4c-37.3 0-67.6 30.2-67.6 67.6l0 124.9c-12.9 0-25.8 3.9-36.8 11.7c-18 12.4-40.1 20.3-59.2 20.3c0 0 0 0 0 0l0-.5 0-128c0-53-43-96-96-96s-96 43-96 96l0 128 0 .5c-19 0-41.2-7.9-59.1-20.3c-11.1-7.8-24-11.7-36.9-11.7l0-124.9C96 190.2 65.8 160 28.4 160C12.7 160 0 147.3 0 131.6L0 96zM306.5 389.9C329 405.4 356.5 416 384 416c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 469.7 417 480 384 480c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 405.2 165.1 416 192 416c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z" />
                                </svg>
                            @break

                            @case('CDE')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M186.1 52.1C169.3 39.1 148.7 32 127.5 32C74.7 32 32 74.7 32 127.5l0 6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2l36.7 205.8c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C192.2 323.7 207 312 224 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5l0-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" />
                                </svg>
                            @break

                            @case('DER')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z" />
                                </svg>
                            @break

                            @case('NEG')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M96 96l0 224c0 35.3 28.7 64 64 64l416 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32c-35.3 0-64 28.7-64 64zm64 160c35.3 0 64 28.7 64 64l-64 0 0-64zM224 96c0 35.3-28.7 64-64 64l0-64 64 0zM576 256l0 64-64 0c0-35.3 28.7-64 64-64zM512 96l64 0 0 64c-35.3 0-64-28.7-64-64zM288 208a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 360c0 66.3 53.7 120 120 120l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-400 0c-39.8 0-72-32.2-72-72l0-240z" />
                                </svg>
                            @break

                            @case('SAL')
                                <svg class="w-full h-full me-1.5" aria-hidden="true" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M232 0c-39.8 0-72 32.2-72 72l0 8L72 80C32.2 80 0 112.2 0 152L0 440c0 39.8 32.2 72 72 72l.2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0s0 0 0 0l272 0 8 0s0 0 0 0l104 0c39.8 0 72-32.2 72-72l0-288c0-39.8-32.2-72-72-72l-88 0 0-8c0-39.8-32.2-72-72-72L232 0zM480 128l88 0c13.3 0 24 10.7 24 24l0 40-56 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l56 0 0 48-56 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l56 0 0 104c0 13.3-10.7 24-24 24l-88 0 0-128 0-208zM72 128l88 0 0 336c0 0 0 0-.1 0l-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0c-13.2 0-24-10.7-24-24l0-104 56 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-56 0 0-48 56 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-56 0 0-40c0-13.3 10.7-24 24-24zM208 72c0-13.3 10.7-24 24-24l176 0c13.3 0 24 10.7 24 24l0 264 0 128-64 0 0-64c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 64-64 0 0-392zm88 24l0 24-24 0c-8.8 0-16 7.2-16 16l0 16c0 8.8 7.2 16 16 16l24 0 0 24c0 8.8 7.2 16 16 16l16 0c8.8 0 16-7.2 16-16l0-24 24 0c8.8 0 16-7.2 16-16l0-16c0-8.8-7.2-16-16-16l-24 0 0-24c0-8.8-7.2-16-16-16l-16 0c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            @break

                            @default
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full me-1.5" aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152l0 264-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427L0 224c0-17.7 14.3-32 32-32l30.3 0c63.6 0 125.6 19.6 177.7 56zm32 264l0-264c52.1-36.4 114.1-56 177.7-56l30.3 0c17.7 0 32 14.3 32 32l0 203c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z" />
                                </svg>
                            @break
                        @endswitch
                    </div>

                    <h5 class="mb-1 text-xl px-4 font-medium text-gray-900 dark:text-white text-center">{{ $school->name }}
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400 text-center">Universidad Modelo, campus
                        Mérida.</span>
                    <div class="mt-4">
                        <x-badges.schoolbadge :type="$school->abbreviation" :color="$school->color" />
                    </div>
                </div>
            </div>
        </div>
        {{-- Principal's information --}}
        <div>
            <x-cards.card-template>
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información del director</h5>
                </div>
                <div class="flow-root">
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <a class="flex items-center"
                                href="{{ route('developer.users.show', $school->principal->matricula) }}">
                                <div class="flex-shrink-0">
                                    <x-badges.rolebadge :role="$school->principal->role" />
                                </div>
                                <div class="flex-1 min-w-0 ms-2 w-full">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Nombre completo
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $school->principal->fullname }}
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
                                        {{ $school->principal->matricula }}
                                    </p>
                                    <input id="user_matricula_paragraph" type="text"
                                        value="{{ $school->principal->matricula }}" class="hidden" readonly>
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
        <x-cards.list-careers :careers="$school->careers" />
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
