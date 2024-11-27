@extends('Layouts.Developer.Dashboard')

@section('content')
    <section class="bg-gray-200 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" id="mainForm" action="{{ route('developer.midterms.index') }}"
                            method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="simple-search" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search"
                                    value="{{ request('simple-search') != null ? request('simple-search') : '' }}">
                                <input type="hidden" id="hiddenMidtermDeactivated" name="hiddenMidtermDeactivated"
                                    value="0">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a type="button" data-modal-target="midterms-create-modal"
                            data-modal-toggle="midterms-create-modal"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Parcial
                        </a>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button>
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Buscar solo</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="SubjectDeactivated" name="SubjectDeactivated" type="checkbox"
                                            value="1"
                                            {{ request('hiddenMidtermDeactivated') == 1 ? 'checked' : '' }}
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="SubjectDeactivated"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Desactivados
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Código</th>
                                <th scope="col" class="px-4 py-3">Abreviación</th> <!-- Nueva columna -->
                                <th scope="col" class="px-4 py-3">Nombre completo</th> <!-- Nueva columna -->
                                <th scope="col" class="px-4 py-3">Fecha de inicio</th>
                                <th scope="col" class="px-4 py-3">Fecha de fin</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Si no hay registros, muestra un mensaje de "No records" --}}
                        @if ($midterms->count() == 0)
                            <tr class="border-b dark:border-gray-700">
                                <td colspan="6" class="text-center p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                     No records
                                </td>
                            </tr>
                        @endif
                        {{-- Si hay registros, muestra cada uno de los parciales --}}
                        @foreach ($midterms->items() as $g)
                            <tr class="border-b dark:border-gray-700">
                                {{-- Midterm Code --}}
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $g->midtermCode }}
                                </th>
                                {{-- Midterm Abbreviation --}}
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $g->abbreviation }} <!-- Mostrar abreviación -->
                                </td>
                                {{-- Midterm Full Name --}}
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $g->fullName }} <!-- Mostrar nombre completo -->
                                </td>
                                {{-- Midterm Start Date --}}
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $g->startDate }}
                                </td>
                                {{-- Midterm End Date --}}
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $g->endDate }}
                                </td>
                                {{-- Action properties --}}
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="{{ $g->midtermCode }}-dropdown-button"
                                        data-dropdown-toggle="{{ $g->midtermCode }}-dropdown"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    </svg>
                                    </button>
                                    <div id="{{ $g->midtermCode }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $g->midtermCode }}-dropdown-button">
                                            {{-- Subject Edit Button --}}
                                            <li>
                                                <button data-modal-target="midterms-{{ $g->midtermCode }}-edit-modal"
                                                        data-modal-toggle="midterms-{{ $g->midtermCode }}-edit-modal"
                                                        class="block w-full py-2 px-4 text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</button>
                                            </li>
                                        </ul>
                                         @if ($g->trashed())
                                             <div class="py-1">
                                                <form action="{{ route('developer.midterms.restore', $g) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Restore</button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="py-1">
                                                <form action="{{ route('developer.midterms.destroy', $g) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Delete</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            {{-- Si hay un solo parcial, muestra un mensaje de "No more records" --}}
                            @if ($midterms->count() == 1)
                                <tr class="border-b dark:border-gray-700">
                                    <td colspan="6" class="text-center p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        No more records
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    {{-- Edit Midterm Modal --}}
    @foreach ($midterms as $g)
        <div id="midterms-{{ $g->midtermCode }}-edit-modal" data-modal-placement="top-center" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Actualizar parcial
                        </h3>
                        <button data-modal-toggle="midterms-{{ $g->midtermCode }}-edit-modal" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('developer.midterms.update', $g) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="grid gap-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="edit_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rango de fechas del parcial</label>
                                <div id="date-{{ $g->midtermCode }}-range-picker" class="flex items-center">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="datepicker-{{ $g->midtermCode }}-range-start" datepicker
                                            datepicker-format="yyyy-mm-dd" name="startDate" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date start" value="{{ $g->startDate }}">
                                    </div>
                                    <span class="mx-4 text-gray-500">to</span>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="datepicker-{{ $g->ode }}-range-end" datepicker
                                            datepicker-format="yyyy-mm-dd" name="endDate" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date end" value="{{ $g->endDate }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 hidden">
                                <label for="edit_updated_by"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated_by</label>
                                <input readonly value="{{ Auth::user()->matricula }}" type="text" name="updated_by"
                                    id="edit_updated_by"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="99" required="">
                            </div>
                        </div>
                        <div class="sm:hidden">
                            <span class="text-[0.6rem]  text-gray-500 dark:text-gray-400 text-center">* Al actualizar el
                                parcial, se actualizarán todos los registros que poseian esta ultima. Aseguresé que lo
                                que
                                esté haciendo esté bien.
                                <br>
                                * Da igual la fecha que ponga, el codigo será formado por los años de inicio y fin,
                                aseguresé que no existan duplicados.
                            </span>
                        </div>
                        <div id="edit_modal_mustread_{{ $g->midtermCode }}" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-900">
                            <span class="text-[0.6rem]  text-gray-500 dark:text-gray-400 text-center">* Al actualizar el
                                parcial, se actualizarán todos los registros que poseian esta ultima. Aseguresé que lo
                                que
                                esté haciendo esté bien.
                                <br>
                                * Da igual la fecha que ponga, el codigo será formado por los años de inicio y fin,
                                aseguresé que no existan duplicados.
                            </span>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button type="submit" data-tooltip-target="edit_modal_mustread_{{ $g->midtermCode }}"
                            class="mt-4 text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Actualizar código
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Create Midterm Modal --}}
    <div id="midterms-create-modal" data-modal-placement="top-center" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Crear parcial
                    </h3>
                    <button data-modal-toggle="midterms-create-modal" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('developer.midterms.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 grid-cols-2">
                            <!-- Abbreviation -->
                            <div class="col-span-2">
                                <label for="abbreviation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abreviacion</label>
                                <input type="text" id="abbreviation" name="abbreviation" required maxlength="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Parcial">
                            </div>

                            <!-- Full Name -->
                            <div class="col-span-2">
                                <label for="fullName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" id="fullName" name="fullName" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre de Parcial">
                            </div>

                            <!-- Date Range with Scroll -->
                            <div class="col-span-2">
                                <label for="startDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rango de fechas del parcial</label>
                                <div id="date-create-range-picker" class="flex items-center overflow-y-auto max-h-60"> <!-- Scroll added here -->
                                    <div class="relative">
                                        <input id="datepicker-create-range-start" datepicker datepicker-format="yyyy-mm-dd" name="startDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Fecha de Inicio" required>
                                    </div>
                                    <span class="mx-4 text-gray-500">to</span>
                                    <div class="relative">
                                        <input id="datepicker-create-range-end" datepicker datepicker-format="yyyy-mm-dd" name="endDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-secondary-500 focus:border-secondary-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Fecha Final" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tooltip info -->
                        <div class="sm:hidden">
                            <span class="text-[0.6rem] text-gray-500 dark:text-gray-400 text-center">
                                * Da igual la fecha que ponga, el codigo será formado por los años de inicio y fin,
                                asegúrese de que no existan duplicados.
                            </span>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="mt-4 text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Crear parcial
                        </button>
                    </form>
            </div>
        </div>
    </div>

    <script>
        /**
         * Send data from filters with the mainForm simple-query
         */
        document.getElementById('mainForm').addEventListener('submit', function() {
            document.getElementById('hiddenMidtermDeactivated').value = document.getElementById(
                    'SubjectDeactivated')
                .checked ? '1' : '0';
        });
    </script>
@endsection
