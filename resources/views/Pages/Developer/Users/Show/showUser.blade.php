@extends('Layouts.Developer.Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
        {{-- Contact info --}}
        <div>
            <x-cards.card-template>
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información de contacto</h5>
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
                                        {{ $user->email }}
                                    </p>
                                    <input id="user_email_paragraph" type="text" value="{{ $user->email }}"
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
                                        {{ $user->phone_number }}
                                    </p>
                                    <input id="user_phone_paragraph" type="text" value="{{ $user->phone_number }}"
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
        {{-- Main profile card --}}
        <div>
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown-editUser"
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
                    <div id="dropdown-editUser"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('developer.users.edit', $user) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                    Data</a>
                            </li>
                            @if ($user->matricula != Auth::user()->matricula)
                                @if ($user->trashed())
                                    <li>
                                        <a href="{{ route('developer.users.restore', $user) }}"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Restore</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('developer.users.delete', $user) }}"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                        src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->matricula }} avatar" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white text-center">{{ $user->fullName }}
                    </h5>
                    <span
                        class="text-sm text-gray-500 dark:text-gray-400 text-center">{{ date('Y') - date('Y', strtotime($user->birthday)) }}
                        años </span>
                    <div class="mt-4">
                        <x-badges.sexbadge :sex="$user->sex" />
                    </div>
                </div>
            </div>
        </div>
        {{-- User information --}}
        <div>
            <x-cards.card-template>
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información del usuario</h5>
                </div>
                <div class="flow-root">
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @if ($user->cedula_profesional != null)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <x-badges.rolebadge :role="$user->role" />
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Rol (Cédula Profesional)
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $user->roleObj->name }}
                                            <span class="text-xs">
                                                ( {{ $user->cedula_profesional }} )
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <x-badges.rolebadge :role="$user->role" />
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Rol
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $user->roleObj->name }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endif
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
                                        {{ $user->matricula }}
                                    </p>
                                    <input id="user_matricula_paragraph" type="text" value="{{ $user->matricula }}"
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
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">

        <x-cards.list-schools :user="$user->matricula" />
        <x-cards.list-coordinador-careers :user="$user->matricula" />


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
