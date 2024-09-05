<x-cards.card-template>

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
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            {{-- First StudyPlans is the careerObj, Second is the StudyPlans in the career  --}}
            @foreach ($studyPlans->studyPlans as $studyPlan)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $studyPlan->code }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $studyPlan->career_code }} ({{ $studyPlans->semester_duration }} Semestres)
                            </p>
                        </div>
                        {{-- Actions Button --}}
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <button id="{{ $studyPlan->slug }}-dropdown-button"
                                data-dropdown-toggle="{{ $studyPlan->slug }}-dropdown"
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
                        <div id="{{ $studyPlan->slug }}-dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="{{ $studyPlan->slug }}-dropdown-button">
                                <li>
                                    <a href="{{ route('developer.users.show', $studyPlan->slug) }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                </li>
                                <li>
                                    <a href="{{ route('developer.users.edit', $studyPlan->slug) }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="{{ route('developer.users.edit', $studyPlan) }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rename</a>
                                </li>
                            </ul>
                            @if ($studyPlan->trashed())
                                <div class="py-1">
                                    <form action="{{ route('developer.studyplans.restore', $studyPlan) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-start">Restore</button>
                                    </form>
                                </div>
                            @else
                                <div class="py-1">
                                    <form action="{{ route('developer.studyplans.destroy', $studyPlan) }}"
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
        </ul>
    </div>


    {{-- Create StudyPlan Button --}}
    <div data-modal-target="studyPlan-create-modal" data-modal-toggle="studyPlan-create-modal"
        class="pt-2 w-full border-t border-gray-200 dark:border-gray-700 item-start">
        <button type="submit"
            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-secondary-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Crear
        </button>
    </div>

</x-cards.card-template>
