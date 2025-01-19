<x-layouts.dashboard>
    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
        </div>
        <div class="w-full h-full mb-4">
            @php
                $columnDetails = [
                    ['name' => 'Usuario', 'searchable' => true, 'inputLength' => 'Long'],
                    ['name' => 'Rol', 'searchable' => true, 'inputLength' => 'Small'],
                    ['name' => 'Sexo', 'searchable' => true, 'inputLength' => 'Small'],
                    ['name' => 'Carrera', 'searchable' => true, 'inputLength' => 'Small'],
                    ['name' => 'Celular', 'searchable' => true, 'inputLength' => 'Long'],
                ];

                $data = \App\Models\User::all();
                $data2 = \App\Models\User::where('Role', 'ALU')->get();
                echo $data[0]->id;
            @endphp

            {{-- TODO: Table component --}}
            <x-table id="users" :columnDetails="$columnDetails" :data="$data" actions="true">
                @foreach ($data as $d)
                    <x-table.row>
                        <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/avatars/' . $d->avatar) }}"
                                alt="{{ $d->matricula }} avatar">
                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                <div class="text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $d->fullName }}
                                </div>
                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    {{ $d->email }} ({{ $d->matricula }})</div>
                            </div>
                        </td>
                        <td>{{ $d->role }}</td>
                        <td>{{ $d->sex }}</td>
                        <td>DTS</td>
                        <td>{{ $d->phone_number }}</td>
                        <td>
                            @php
                                $actionroutes = [
                                    ['name' => 'Show', 'route' => 'dashboard.main', 'params' => $d->matricula],
                                    ['name' => 'Edit', 'route' => 'dashboard.main', 'params' => $d->matricula],
                                    ['name' => 'Delete', 'route' => 'dashboard.main', 'params' => $d->matricula],
                                    ['name' => 'Restore', 'route' => 'dashboard.main', 'params' => $d->matricula],
                                ];
                            @endphp
                            <x-table.action id="action-users" :currentData="$d" :routes="$actionroutes" />
                        </td>
                    </x-table.row>
                @endforeach
            </x-table>

        </div>
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
    </main>

</x-layouts.dashboard>
