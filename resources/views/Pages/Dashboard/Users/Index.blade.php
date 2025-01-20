<x-layouts.dashboard>
    <div class="w-full h-full mb-4">
        <x-table id="users" :columnDetails="$columnDetails" :data="$data" actions="true" addRecordRoute="dashboard.main" addRecordText="Add Student">
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
                    <td> {{ $d->trashed() ? 'Inactive' : 'Active' }} </td>
                    <td>
                        <x-table.action id="action-users" :currentData="$d" :routes="$d->routes" />
                    </td>
                </x-table.row>
            @endforeach
        </x-table>
    </div>
</x-layouts.dashboard>
