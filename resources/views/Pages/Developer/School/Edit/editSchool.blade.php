@extends('Layouts.Developer.Dashboard')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Actualizar escuela</h2>
            <form action="{{ route('developer.schools.update', $school) }}" method="POST">
                @method('PUT')
                @csrf
                <div id="accordion-open" data-accordion="open">
                    <h2 id="accordion-open-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                            aria-controls="accordion-open-body-1">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 me-2 shrink-0 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
                                        clip-rule="evenodd" />
                                </svg> Datos de la escuela</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre completo
                                        de la escuela</label>
                                    <input type="text" name="name" id="name" maxlength="75"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Escuela de ingeniería" required=""
                                        @if (old('name') != null) value="{{ old('name') }}"
                                        @else
                                            value="{{ $school->name }}" @endif>
                                </div>
                                <div class="w-full">
                                    <label for="abbreviation"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abreviación</label>
                                    <input type="text" name="abbreviation" id="abbreviation" maxlength="3"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="ING" required=""
                                        @if (old('abbreviation') != null) value="{{ old('abbreviation') }}"
                                        @else
                                            value="{{ $school->abbreviation }}" @endif>
                                </div>
                            </div>
                            <div class="grid gap-5 sm:grid-cols-2 sm:gap-6 mt-4">

                            </div>

                            {{-- Schoolbadge color --}}
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div>
                                    <label for="color"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color del
                                        icono</label>
                                    <select id="color" onchange="onColorChanged()" name="color"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option>Select color</option>
                                        <option value="purple" @if (old('color') == 'purple') {{ 'selected' }} @endif>
                                            Morado</option>
                                        <option value="blue" @if (old('color') == 'blue') {{ 'selected' }} @endif>
                                            Azul</option>
                                        <option value="red" @if (old('color') == 'red') {{ 'selected' }} @endif>
                                            Rojo</option>
                                        <option value="amber" @if (old('color') == 'amber') {{ 'selected' }} @endif>
                                            Ámbar</option>
                                        <option value="yellow" @if (old('color') == 'yellow') {{ 'selected' }} @endif>
                                            Amarillo</option>
                                        <option value="lime"
                                            @if (old('color') == 'lime') {{ 'selected' }} @endif>
                                            Lima</option>
                                        <option value="violet"
                                            @if (old('color') == 'violet') {{ 'selected' }} @endif>
                                            Violeta</option>
                                        <option value="rose"
                                            @if (old('color') == 'rose') {{ 'selected' }} @endif>
                                            Rosa</option>
                                        <option value="green"
                                            @if (old('color') == 'green') {{ 'selected' }} @endif>
                                            Verde</option>
                                        <option value="fuchsia"
                                            @if (old('color') == 'fuchsia') {{ 'selected' }} @endif>
                                            Fuchsia</option>
                                        <option value="sky"
                                            @if (old('color') == 'sky') {{ 'selected' }} @endif>
                                            Azul cielo</option>
                                        <option value="pink"
                                            @if (old('color') == 'pink') {{ 'selected' }} @endif>
                                            Rosado</option>
                                        <option value="emerald"
                                            @if (old('color') == 'emerald') {{ 'selected' }} @endif>
                                            Esmeralda</option>
                                        <option value="cyan"
                                            @if (old('color') == 'cyan') {{ 'selected' }} @endif>
                                            Cian</option>
                                        <option value="orange"
                                            @if (old('color') == 'orange') {{ 'selected' }} @endif>
                                            Naranja</option>
                                        <option value="indigo"
                                            @if (old('color') == 'indigo') {{ 'selected' }} @endif>
                                            Indigo</option>
                                        <option value="slate"
                                            @if (old('color') == 'slate') {{ 'selected' }} @endif>
                                            Pizarra</option>
                                        <option value="gray"
                                            @if (old('color') == 'gray') {{ 'selected' }} @endif>
                                            Gris</option>
                                    </select>
                                </div>
                                <div class="py-4 px-4">
                                    <div class="h-full content-center items-center">
                                        <label for="preview"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preview</label>
                                        @foreach (['purple', 'blue', 'red', 'amber', 'yellow', 'lime', 'violet', 'teal', 'rose', 'green', 'fuchsia', 'sky', 'pink', 'emerald', 'cyan', 'orange', 'indigo', 'slate', 'gray'] as $color)
                                            <a disabled class="hidden" name="preview-{{ $color }}"
                                                id="preview-{{ $color }}">
                                                <x-badges.schoolbadge :type="'TXT'" :color="$color" />
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 id="accordion-open-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                            aria-controls="accordion-open-body-2">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 me-2 shrink-0 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                        clip-rule="evenodd" />
                                </svg>Director</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                        <div class="p-5 border border-b border-gray-200 dark:border-gray-700">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div>
                                    <label for="director_matricula"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                                    <select id="director_matricula" name="director_matricula"
                                        onchange="onCandidateChanged()" readonly
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected>Select principal</option>
                                        @foreach ($candidates as $c)
                                            <option value="{{ $c->matricula }}"
                                                @if (old('director_matricula') == '{{ $c->matricula }}') {{ 'selected' }} @endif>
                                                ({{ $c->matricula }}) - {{ $c->fullName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                        electrónico</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 16">
                                                <path
                                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                <path
                                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="email" name="email" disabled readonly
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="15221669@modelo.edu.mx" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Created_by and Updated_by fields --}}
                    <div class="mt-4 hidden">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            <div class="w-full">
                                <label for="updated_by"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Updated_by</label>
                                <input type="text" name="updated_by" id="updated_by"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="15221669" value="{{ Auth::user()->matricula }}" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-4 flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Actualizar escuela
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        colorSelect = document.getElementById('color');
        if (@json(old('color')) != null){
            colorSelect.value = @json(old('color'));
        }
        else{
            colorSelect.value =  @json($school->color);
        }
        
        onColorChanged();
        candidateSelect = document.getElementById('director_matricula');      

        if (@json(old('director_matricula')) != null){
            candidateSelect.value = @json(old('director_matricula'));
        }
        else{
            candidateSelect.value =  @json($school->director_matricula);
        }

        onCandidateChanged();

        function onColorChanged() {
            color = document.getElementById('color').value;
            let xPreviews = document.querySelectorAll('[id^="preview-"]');
            xPreviews.forEach(element => {
                if (element.name == "preview-" + color) {
                    element.classList.remove('hidden');
                } else {
                    element.classList.add('hidden');
                }
            });
        }

        function onCandidateChanged() {
            candidate = document.getElementById('director_matricula').value;
            emailInput = document.getElementById('email');
            @json($candidates).forEach(element => {
                if (element['matricula'] == candidate) {
                    emailInput.value = element['email']
                }
            });
            if (candidate == 'Select principal') {
                emailInput.value = null;
            }
        }
    </script>
@endsection
