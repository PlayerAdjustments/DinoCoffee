<x-layouts.dashboard>
    {{-- Todo: Make spinning component (And activate it when pressed the submit button) --}}
    {{-- Todo: Make Breadcrum component --}}
    {{-- Todo: Put the "Agregar estudiante" Header --}}
    <x-form action="{{ route('dashboard.main') }}" method="POST">
        <x-accordion id="users-form" :collapse="false">
            {{-- ? Datos personales --}}
            <x-accordion.heading id="datos-personales" target="datos-personales" text="Datos Personales"
                icon='<path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd" />'
                :options="[
                    'arrow' => true,
                    'positionFirst' => true,
                    'viewbox' => '0 0 24 24',
                ]" />

            <x-accordion.body id="datos-personales" parent="datos-personales">
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div>
                        <x-form.input name="name" label="Nombre(s)" value="" :options="[
                            'placeholder' => 'Fernando Augusto',
                            'required' => 'true',
                        ]" />
                    </div>
                    <div>
                        <x-form.input name="first_lastname" label="Apellido Paterno" value="" :options="[
                            'placeholder' => 'Zavala',
                            'required' => 'true',
                        ]" />
                    </div>
                    <div>
                        <x-form.input name="second_lastname" label="Apellido Materno" value=""
                            :options="[
                                'placeholder' => 'Gómez',
                                'required' => 'true',
                            ]" />
                    </div>
                    <div>
                        <x-form.input name="birthday" label="Fecha de nacimiento" value=""
                            icon='<path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />'
                            :options="[
                                'placeholder' => 'Select date',
                                'datepicker' => 'true',
                                'required' => 'true',
                            ]" />
                    </div>
                    <div>
                        <x-form.select id="sex" name="sex" label="Sexo" :options="['placeholder' => 'Selecciona un sexo']">
                            <x-form.select.option value="M" text="Hombre" parent="sex" />
                            <x-form.select.option value="F" text="Mujer" parent="sex" />
                        </x-form.select>
                    </div>
                    <div>
                        <x-form.input name="phone_number" label="Número celular" value=""
                            icon='<path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />'
                            :options="[
                                'placeholder' => '+52 9993681035',
                                'viewbox' => '0 0 19 18',
                                'regex' => '(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}',
                                'helper' => '* El número debe coincidir con el formato',
                                'required' => 'true',
                            ]" />
                    </div>
                </div>
            </x-accordion.body>
            {{-- ? Credenciales de usuario --}}
            <x-accordion.heading id="credenciales-usuario" target="credenciales-usuario" text="Credenciales de Usuario"
                icon='<path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />'
                :options="[
                    'arrow' => true,
                    'positionLast' => true,
                    'viewbox' => '0 0 24 24',
                ]" />
            <x-accordion.body id="credenciales-usuario" parent="credenciales-usuario" :positionLast="true">
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div>
                        <x-form.input name="matricula" label="Matrícula" value="" :options="[
                            'placeholder' => '15221669',
                            'required' => 'true',
                        ]" />
                    </div>
                    <div>
                        <x-form.input name="role" label="Rol" value="Alumno" :options="[
                            'disabled' => 'true',
                            'readonly' => 'true',
                        ]" />
                    </div>
                    <div>
                        <x-form.input name="email" label="Correo Electrónico" value="" :options="[
                            'placeholder' => '15221669@modelo.edu.mx',
                            'required' => true,
                        ]" />
                    </div>
                </div>
            </x-accordion.body>
        </x-accordion>
        {{-- ! Here goes the button component (Replace this with own) --}}
        <button type="submit"
            class="mt-4 flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            Agregar estudiante
        </button>
    </x-form>
</x-layouts.dashboard>
