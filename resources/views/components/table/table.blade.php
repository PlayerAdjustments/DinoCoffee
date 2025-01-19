<table id="{{ $id }}">
    <thead>
        <tr>
            @foreach ($columnDetails as $col)
                <th>
                    <span class="flex items-center">
                        {{ trim(ucfirst($col['name'])) }}
                    </span>
                </th>
            @endforeach

            @if ($actions)
                <th>
                    <span class="flex items-center">
                        Actions
                    </span>
                </th>
            @endif
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>

<script>
    
    var lengths = @json($columnDetails).map(col => col.inputLength);
    var searchableColumns = @json($columnDetails).filter(col => col.searchable).map((_, index) => index);

    if (document.getElementById("{{ $id }}") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#{{ $id }}", {
            searchable: false,
            perPage: 5,
            tableRender: (_data, table, type) => {
                if (type === "print") {
                    return table;
                }
                const tHead = table.childNodes[0];

                const filterHeaders = {
                    nodeName: "TR",
                    attributes: {
                        class: "search-filtering-row"
                    },
                    childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({
                            nodeName: "TH",
                            childNodes: searchableColumns.includes(index) // Check column name.
                                ?
                                [{
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input p-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 " + (lengths[index] == 'Long' ? 'w-full' : 'w-20'),
                                        type: "search",
                                        "data-columns": "[" + index + "]",
                                        placeholder: "Filter"
                                    }
                                }] :
                                [] // No input for non-searchable columns.
                        })
                    )
                };

                tHead.childNodes.push(filterHeaders);
                return table;
            }
        });
    }
</script>
