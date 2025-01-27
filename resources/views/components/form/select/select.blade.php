<label for="{{ $name }}"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
<select id="{{ $id }}" name="{{ $name }}"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
    @required($options['required'])
    @readonly($options['readonly'])
    @disabled($options['disabled'])>
    <option selected disabled value="">{{ $options['placeholder'] }}</option>
    {{ $slot }}
</select>
@error($name)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
@enderror
