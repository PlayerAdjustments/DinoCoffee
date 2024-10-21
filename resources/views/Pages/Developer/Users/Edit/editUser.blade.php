@extends('Layouts.Developer.Dashboard')

@section('content')
    <form action="{{ route('developer.users.update', $user) }}" method="POST" id="editForm">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <div>
                <div
                    class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información de contacto
                        </h5>
                    </div>
                    <div class="flow-root">
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button disabled id="email_clipboard_button"
                                            class="end-2 text-gray-500 dark:text-gray-400 rounded-lg p-2 inline-flex items-center justify-center">
                                            <span id="default-email-icon">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 16">
                                                    <path
                                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                    <path
                                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Correo electrónico
                                        </p>
                                        <input type="text" id="email" name="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="15221669@modelo.edu.mx"
                                            @if (old('email') != null) value="{{ old('email') }}"
                                        @else
                                            value="{{ $user->email }}" @endif>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button disabled id="phone_clipboard_button"
                                            class="end-2 text-gray-500 dark:text-gray-400 rounded-lg p-2 inline-flex items-center justify-center">
                                            <span id="default-phone-icon">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Número celular
                                        </p>
                                        <input type="text" id="phone_number" name="phone_number"
                                            aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            pattern="(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}"
                                            placeholder="+52 9993681035" required=""
                                            @if (old('phone_number') != null) value="{{ old('phone_number') }}"
                                            @else
                                                value="{{ $user->phone_number }}" @endif />
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button disabled id="birthday_clipboard_button"
                                            class="end-2 text-gray-500 dark:text-gray-400 rounded-lg p-2 inline-flex items-center justify-center">
                                            <span id="default-birthday-icon">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Fecha de nacimiento
                                        </p>
                                        <input id="birthday" name="birthday" datepicker type="text"
                                            datepicker-format="yyyy-mm-dd" datepicker-min-date="{{ date('Y') - 80 }}-12-31"
                                            data-date="2004-06-05" datepicker-max-date="{{ date('Y') - 16 }}-12-31"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date"
                                            @if (old('birthday') != null) value="{{ old('birthday') }}" @else value="{{ $user->birthday }}" @endif>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">* Cambie la información
                            deseada
                            en los inputs.</span>
                    </div>
                </div>
            </div>
            <div>
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        @isset($user->deleted_at)
                            <div class="w-full justify-items-start inline-flex align-sub">
                                <button disabled id="form_restore_user_button" type="button"
                                    class="inline-block text-gray-500 dark:text-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5">
                                    <span class="sr-only">Restore user</span>
                                    <svg id="default-RestoreUser-icon" class="w-5 h-5 text-red-400 dark:text-red-300 "
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span id="restoreUser-success-icon" class="hidden inline-flex items-center">
                                        <svg class="w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                    </span>
                                </button>
                                <div>
                                    <span class="text-[0.6rem] text-red-800 dark:text-red-200">
                                        {{ $user->birthday }}
                                    </span>
                                </div>
                            </div>
                        @endisset
                        <div class="hidden">
                            <label for="deleted_at"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">deleted_at</label>
                            <input readonly disabled type="text" name="deleted_at" id="deleted_at"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" required="" value="">
                        </div>
                        <button id="form_saveChanges_button" data-tooltip-target="tooltip-saveChanges-button"
                            data-tooltip-placement="bottom" type="submit"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 hover:text-primary-700 dark:hover:text-primary-500 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5">
                            <span class="sr-only">Save changes</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="tooltip-saveChanges-button" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            <span id="default-matricula-tooltip-message">Guardar cambios</span>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->matricula }} avatar" />
                        <div class="grid gap-4 sm:grid-cols-1 sm:gap-2">
                            <div class="w-full">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre(s)</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Fernando Augusto" required=""
                                    @if (old('name') != null) value="{{ old('name') }}"
                                    @else
                                        value="{{ $user->name }}" @endif>
                            </div>
                            <div class="w-full">
                                <label for="first_lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                                    Paterno</label>
                                <input type="text" name="first_lastname" id="first_lastname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Zavala" required=""
                                    @if (old('first_lastname') != null) value="{{ old('first_lastname') }}"
                                @else
                                    value="{{ $user->first_lastname }}" @endif>
                            </div>
                            <div class="w-full">
                                <label for="second_lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                                    Materno</label>
                                <input type="text" name="second_lastname" id="second_lastname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Gomez" required=""
                                    @if (old('second_lastname') != null) value="{{ old('second_lastname') }}"
                                @else
                                    value="{{ $user->second_lastname }}" @endif>
                            </div>
                            <div class="w-full">
                                <label for="sex"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexo</label>
                                <select id="sex" name="sex"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="M" @if ($user->sex == 'M') {{ 'selected' }} @endif
                                        @if (old('sex') == 'M') {{ 'selected' }} @endif>Hombre</option>
                                    <option value="F" @if ($user->sex == 'F') {{ 'selected' }} @endif
                                        @if (old('sex') == 'F') {{ 'selected' }} @endif>Mujer</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="inline-flex items-center mt-2 cursor-pointer">
                                    <input name="password" type="checkbox" value="changePassword" class="sr-only peer">
                                    <div
                                        class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-primary-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-primary-600 peer-checked:bg-secondary-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Cambiar
                                        contraseña</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <div
                    class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 text-gray-800 dark:text-white mr-4" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Información del usuario
                        </h5>
                    </div>
                    <div class="flow-root">
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <x-badges.rolebadge :role="$user->role" />
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Rol
                                        </p>
                                        <select id="role" name="role" required=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="DEV"
                                                @if ($user->role == 'DEV') {{ 'selected' }} @endif
                                                @if (old('role') == 'DEV') {{ 'selected' }} @endif>Developer
                                            </option>
                                            <option value="ADM"
                                                @if ($user->role == 'ADM') {{ 'selected' }} @endif
                                                @if (old('role') == 'ADM') {{ 'selected' }} @endif>
                                                Administrativo
                                            </option>
                                            <option value="DIR"
                                                @if ($user->role == 'DIR') {{ 'selected' }} @endif
                                                @if (old('role') == 'DIR') {{ 'selected' }} @endif>Director
                                            </option>
                                            <option value="COO"
                                                @if ($user->role == 'COO') {{ 'selected' }} @endif
                                                @if (old('role') == 'COO') {{ 'selected' }} @endif>Coordinador
                                            </option>
                                            <option value="DOC"
                                                @if ($user->role == 'DOC') {{ 'selected' }} @endif
                                                @if (old('role') == 'DOC') {{ 'selected' }} @endif>Docente
                                            </option>
                                            <option value="ALU"
                                                @if ($user->role == 'ALU') {{ 'selected' }} @endif
                                                @if (old('role') == 'ALU') {{ 'selected' }} @endif>Alumno
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button disabled id="matricula_clipboard_button"
                                            class="end-2 text-gray-500 dark:text-gray-400 rounded-lg p-2 inline-flex items-center justify-center">
                                            <span id="default-matricula-icon">
                                                <svg class="w-5 h-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Matricula
                                        </p>
                                        <input type="text" name="matricula" id="matricula"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="15221669" required=""
                                            @if (old('matricula') != null) value="{{ old('matricula') }}"
                                    @else
                                        value="{{ $user->matricula }}" @endif>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <button disabled id="cedulaProfesional_clipboard_button"
                                            class="end-2 text-gray-500 dark:text-gray-400 rounded-lg p-2 inline-flex items-center justify-center">
                                            <span id="default-matricula-icon">
                                                <svg class="w-5 h-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-2 w-full">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Cédula profesional
                                        </p>
                                        <input type="text" name="cedula_profesional" id="cedula_profesional"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="15221669" required=""
                                            @if (old('cedula_profesional') != null) value="{{ old('cedula_profesional') }}"
                                    @else
                                        value="{{ $user->cedula_profesional }}" @endif>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">* Cambie la información
                            deseada en los inputs.</span>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
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
         * Enable and disable the input of cedula_profesional based on the current user selected role.
         */
        const input_cedula_profesional = document.getElementById('cedula_profesional');
        const select_role = document.getElementById('role');

        const accepted_roles = ['DOC', 'COO', 'DIR']


        if (accepted_roles.includes(select_role.value)) {
            input_cedula_profesional.disabled = false;
            input_cedula_profesional.classList.remove('line-through');
        } else {
            input_cedula_profesional.disabled = true;
            input_cedula_profesional.classList.add('line-through');
        }

        select_role.onchange = (event) => {
            if (accepted_roles.includes(select_role.value)) {
                input_cedula_profesional.disabled = false;
                input_cedula_profesional.classList.remove('line-through');
                input_cedula_profesional.required = true;
            } else {
                input_cedula_profesional.disabled = true;
                input_cedula_profesional.classList.add('line-through');
                input_cedula_profesional.required = false;
            }
        }
    </script>
@endsection
