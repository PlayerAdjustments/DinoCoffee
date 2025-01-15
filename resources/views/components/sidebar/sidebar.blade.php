<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">

    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <div class="space-y-2">
            <x-sidebar.roles.developer />
            <x-sidebar.roles.administrative />
            <x-sidebar.roles.principal />
            <x-sidebar.roles.coordinator />
            <x-sidebar.roles.teacher />
            <x-sidebar.roles.student />
        </div>
    </div>

    {{$slot}}
    
</aside>
