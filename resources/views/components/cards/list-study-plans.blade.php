<x-cards.card-template>

    <div class="block">
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M384 480l48 0c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224l-400 0c-11.4 0-21.9 6-27.6 15.9L48 357.1 48 96c0-8.8 7.2-16 16-16l117.5 0c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8L416 144c8.8 0 16 7.2 16 16l0 32 48 0 0-32c0-35.3-28.7-64-64-64L298.5 96c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l23.7 0L384 480z" />
            </svg>
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Planes de estudio</h5>
        </div>

        <div>
            <label class="inline-flex items-center mb-5 cursor-pointer">
                <input id="studyplan-show-trashed" type="checkbox" onchange="studyplan_ToggleTrashedItems()" value="" class="sr-only peer">
                <div
                    class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-350 dark:peer-focus:ring-secondary-400 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Ver desactivados</span>
            </label>
        </div>
    </div>


    {{-- Main list --}}
    <div
        class="flow-root max-h-96 max-w-full scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-white dark:scrollbar-track-gray-800 overflow-y-auto">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            {{-- First StudyPlans is the careerObj, Second is the StudyPlans in the career  --}}
            @foreach ($studyplans as $s)
                <li class="py-3 studyplan-item {{ $s->trashed() ? 'trashed' : '' }} sm:py-4">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $s->code }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $s->careercodes->joined }} ({{ $s->careercodes->career->semester_duration }}
                                Semestres)
                            </p>
                        </div>
                        {{-- Actions Button --}}
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <button id="{{ $s->slug }}-dropdown-button"
                                data-dropdown-toggle="{{ $s->slug }}-dropdown"
                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </div>
                        {{-- Actions Dropdown --}}
                        <div id="{{ $s->slug }}-dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="{{ $s->slug }}-dropdown-button">
                                <li>
                                    <a href="{{ route('developer.users.show', $s->slug) }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Subjects</a>
                                </li>
                                <li class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <button data-modal-toggle="studyplan-edit-modal-{{ $s->slug }}"
                                        class="block py-2 px-4 w-full text-start">Edit</button>
                                </li>
                            </ul>
                            @if ($s->trashed())
                                <div class="py-1">
                                    <form action="{{ route('developer.studyplans.restore', $s) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Restore</button>
                                    </form>
                                </div>
                            @else
                                <div class="py-1">
                                    <form action="{{ route('developer.studyplans.destroy', $s) }}" method="POST">
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
        </ul>
    </div>

    {{-- Create StudyPlan Button --}}
    <div data-modal-target="studyplan-create-modal" data-modal-toggle="studyplan-create-modal"
        class="pt-2 w-full border-t border-gray-200 dark:border-gray-700 item-start">
        <button type="button"
            @if (count($careercodes) <= 0) disabled
                data-popover-target="popover-no-careercodes" @endif
            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">


            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Crear
        </button>

        <div data-popover id="popover-no-careercodes" role="tooltip"
            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div
                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">Códigos de carrera</h3>
            </div>
            <div class="px-3 py-2">
                <p>No existen códigos de la carrera o estos han sido desactivados.</p>
                <p>* Crea o activa los códigos antes de crear un plan de estudios.</p>
            </div>
            <div data-popper-arrow></div>
        </div>
    </div>

    {{-- Create StudyPlan Modal --}}
    <div id="studyplan-create-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Crear plan de estudios de la carrera
                    </h3>
                    <button data-modal-toggle="studyplan-create-modal" type="button"
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
                <form class="p-4 md:p-5" action="{{ route('developer.studyplans.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-4">
                        <div class="col-span-2">
                            <label for="careercode_joined"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código de la
                                carrera</label>
                            <select id="studyplan_store_careercode_joined" name="career_code" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected disabled>Select Career Code</option>
                                @if (count($careercodes) > 0)
                                    @foreach ($careercodes as $c)
                                        <option value="{{ $c }}"
                                            @if (old('career_code') == '{{ $c }}') {{ 'selected' }} @endif>
                                            {{ $c }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" selected> You must create a CareerCode First</option>
                                @endif
                            </select>



                        </div>
                        <div class="col-span-2">
                            <label for="careercode_joined"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mínimo
                                aprobatorio</label>
                            <input type="number" id="studyplan-create-modal-PassingGrade" name="passing_grade"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="60" required min="50" max="100" value="60"
                                title="Please enter a valid number (50-100)" />
                        </div>
                        <div class="col-span-4 inline-flex gap-4 text-center">
                            <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">RVOE no.</p>
                            <input type="number" id="studyplan-create-modal-RVOENo" name="rvoe_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="285" required min="0" />
                            <p class="mb-2 text-3xl font-medium text-gray-900 dark:text-white">/</p>
                            <input type="number" id="studyplan-create-modal-RVOEYear" name="rvoe_year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="2013" required min="2000" max="2099"
                                title="Please enter a valid year (2000-2099)" />
                        </div>



                    </div>
                    <button type="submit"
                        @if (count($careercodes) <= 0) disabled
                            data-popover-target="popover-no-careercodes-modal" @endif
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">


                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Crear plan de estudio
                    </button>
                    <div data-popover id="popover-no-careercodes-modal" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Códigos de carrera</h3>
                        </div>
                        <div class="px-3 py-2">
                            <p>No existen códigos de la carrera o estos han sido desactivados.</p>
                            <p>* Crea o activa los códigos antes de crear un plan de estudios.</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @foreach ($studyplans as $s)
        {{-- Edit StudyPlan Modal --}}
        <div data-modal-target="studyplan-edit-modal-{{ $s->slug }}"
            id="studyplan-edit-modal-{{ $s->slug }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Editar plan de estudios de la carrera
                        </h3>
                        <button data-modal-toggle="studyplan-edit-modal-{{ $s->slug }}" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('developer.studyplans.update', $s) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-4">
                            <div class="col-span-2">
                                <label for="careercode_joined"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código de la
                                    carrera</label>
                                <select id="studyplan_update_careercode_joined" name="career_code" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected disabled>Select Career Code</option>
                                    @if (count($careercodes) > 0)
                                        @foreach ($careercodes as $c)
                                            <option value="{{ $c }}"
                                                @if (old('career_code') == '{{ $c }}' || $s->career_code == $c) {{ 'selected' }} @endif>
                                                {{ $c }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>



                            </div>
                            <div class="col-span-2">
                                <label for="careercode_joined"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mínimo
                                    aprobatorio</label>
                                <input type="number" id="studyplan-create-modal-PassingGrade" name="passing_grade"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="60" required min="50" max="100"
                                    value="{{ $s->passing_grade }}" title="Please enter a valid number (50-100)" />
                            </div>
                            <div class="col-span-4 inline-flex gap-4 text-center">
                                <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">RVOE no.</p>
                                <input type="number" id="studyplan-create-modal-RVOENo" name="rvoe_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="285" required min="0"
                                    value="{{ (int) $s->RVOENumbers['number'] }}" />
                                <p class="mb-2 text-3xl font-medium text-gray-900 dark:text-white">/</p>
                                <input type="number" id="studyplan-create-modal-RVOEYear" name="rvoe_year"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="2013" required min="2000" max="2099"
                                    value="{{ $s->RVOENumbers['year'] }}"
                                    title="Please enter a valid year (2000-2099)" />
                            </div>



                        </div>
                        <button type="submit"
                            @if (count($careercodes) <= 0) disabled
                            data-popover-target="popover-no-careercodes-modal" @endif
                            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">


                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Actualizar plan de estudio
                        </button>
                        <div data-popover id="popover-no-careercodes-modal" role="tooltip"
                            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div
                                class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Códigos de carrera</h3>
                            </div>
                            <div class="px-3 py-2">
                                <p>No existen códigos de la carrera o estos han sido desactivados.</p>
                                <p>* Crea o activa los códigos antes de crear un plan de estudios.</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

<script>
    function studyplan_ToggleTrashedItems() {
        console.log('ran command');
        const isChecked = document.getElementById('studyplan-show-trashed').checked;
        const studyplanItems = document.querySelectorAll('.studyplan-item');

        studyplanItems.forEach(item => {
            if (item.classList.contains('trashed')) {
                // Show trashed items only if toggle is checked
                item.classList.toggle('hidden', !isChecked);
            } else {
                // Hide non-trashed items if toggle is checked
                item.classList.toggle('hidden', isChecked);
            }
        });
    }


    // Initial call to set the visibility based on the toggle state on page load
    document.addEventListener('DOMContentLoaded', studyplan_ToggleTrashedItems);
</script>


</x-cards.card-template>



