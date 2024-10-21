<x-cards.card-template>
    <div class="flex items-center mb-4">
        <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
                d="M418.4 157.9c35.3-8.3 61.6-40 61.6-77.9c0-44.2-35.8-80-80-80c-43.4 0-78.7 34.5-80 77.5L136.2 151.1C121.7 136.8 101.9 128 80 128c-44.2 0-80 35.8-80 80s35.8 80 80 80c12.2 0 23.8-2.7 34.1-7.6L259.7 407.8c-2.4 7.6-3.7 15.8-3.7 24.2c0 44.2 35.8 80 80 80s80-35.8 80-80c0-27.7-14-52.1-35.4-66.4l37.8-207.7zM156.3 232.2c2.2-6.9 3.5-14.2 3.7-21.7l183.8-73.5c3.6 3.5 7.4 6.7 11.6 9.5L317.6 354.1c-5.5 1.3-10.8 3.1-15.8 5.5L156.3 232.2z" />
        </svg>

        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Códigos</h5>
    </div>

    {{-- Main list --}}
    <div
        class="flow-root max-h-96 max-w-full scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-white dark:scrollbar-track-gray-800 overflow-y-auto">
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($codes as $c)
                <li class="py-3 sm:py-4">
                    <a class="flex items-center align-middle" disabled>
                        <div class="text-lg font-medium w-full text-start text-gray-900 truncate dark:text-white">
                            {{ $c->joined }}
                        </div>
                        <div class="inline-flex min-w-0 ms-4 w-full justify-end">
                            {{-- Edit Button --}}
                            <button data-modal-target="careercode-{{ $c->joined }}-edit-modal"
                                data-modal-toggle="careercode-{{ $c->joined }}-edit-modal"
                                data-tooltip-target="tooltip-{{ $c->joined }}-edit" data-tooltip-placement="top"
                                type="submit"
                                class="text-primary-700 border border-primary-700 hover:bg-primary-700 hover:text-secondary-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-primary-500 dark:text-secondary-500 dark:hover:text-primary-800 dark:focus:ring-primary-800 dark:hover:bg-primary-500">

                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                </svg>

                                <span class="sr-only">Edit</span>
                            </button>

                            <div id="tooltip-{{ $c->joined }}-edit" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Edit
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            @if ($c->trashed())
                                <form action="{{ route('developer.careercodes.restore', $c) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button data-tooltip-target="tooltip-{{ $c->joined }}-restore"
                                        data-tooltip-placement="top" type="submit"
                                        class="text-primary-700 border border-primary-700 hover:bg-primary-700 hover:text-secondary-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-primary-500 dark:text-secondary-500 dark:hover:text-primary-800 dark:focus:ring-primary-800 dark:hover:bg-primary-500">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3 192 320c0 17.7 14.3 32 32 32s32-14.3 32-32l0-210.7 73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 64c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 64c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-64z" />
                                        </svg>
                                        <span class="sr-only">Restore</span>
                                    </button>

                                    <div id="tooltip-{{ $c->joined }}-restore" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Restore
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                </form>
                            @else
                                <form action="{{ route('developer.careercodes.destroy', $c) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button data-tooltip-target="tooltip-{{ $c->joined }}-destroy"
                                        data-tooltip-placement="top" type="submit"
                                        class="text-primary-700 border border-primary-700 hover:bg-primary-700 hover:text-secondary-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-primary-500 dark:text-secondary-500 dark:hover:text-primary-800 dark:focus:ring-primary-800 dark:hover:bg-primary-500">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                        <span class="sr-only">Destroy</span>
                                    </button>

                                    <div id="tooltip-{{ $c->joined }}-destroy" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Delete
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Edit CareerCode Modal --}}
    @foreach ($codes as $c)
        <div id="careercode-{{ $c->joined }}-edit-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Actualizar código de la carrera
                        </h3>
                        <button data-modal-toggle="careercode-{{ $c->joined }}-edit-modal" type="button"
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
                    <form class="p-4 md:p-5" action="{{ route('developer.careercodes.update', $c) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="edit_career_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre completo
                                    de la carrera</label>
                                <input disabled readonly value="{{ $c->career->name }}" type="text"
                                    name="edit_career_name" id="edit_career_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Ingeniería en desarollo de tecnología y software." required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="edit_career_abbreviation" max="3"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abreviación
                                    carrera</label>
                                <input readonly value="{{ $c->career_abbreviation }}" type="text"
                                    name="career_abbreviation" id="edit_career_abbreviation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="DTS" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="edit_career_code"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abreviación
                                    carrera</label>
                                <input value="{{ $c->code }}" type="number" min="0" max="100000"
                                    name="code" id="edit_career_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="99" required="">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">
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

    {{-- Create CareerCode Modal --}}
    <div data-modal-target="careercode-create-modal"
        data-modal-toggle="careercode-create-modal" class="pt-2 w-full border-t border-gray-200 dark:border-gray-700 item-start">
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

    {{-- Create CareerCode Modal --}}
    <div id="careercode-create-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Crear código de la carrera
                    </h3>
                    <button data-modal-toggle="careercode-create-modal" type="button"
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
                <form class="p-4 md:p-5" action="{{ route('developer.careercodes.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="create_career_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre completo
                                de la carrera</label>
                            <input disabled readonly value="{{ $career->name }}" type="text"
                                name="create_career_name" id="create_career_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Ingeniería en desarollo de tecnología y software." required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="create_career_abbreviation" max="3"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abreviación
                                carrera</label>
                            <input readonly value="{{ $career->abbreviation }}" type="text"
                                name="career_abbreviation" id="create_career_abbreviation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="DTS" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="create_career_code"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                            <input value="" type="number" min="0" max="100000"
                                name="code" id="create_career_code"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="99" required="">
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Crear código
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-cards.card-template>
