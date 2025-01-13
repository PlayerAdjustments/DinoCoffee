<a href={{route($route)}} class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
    {{$slot}}
    <div class="text-sm text-gray-900 dark:text-white">{{ $appname }}</div>
</a>
