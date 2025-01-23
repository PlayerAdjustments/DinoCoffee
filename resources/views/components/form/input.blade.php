<label for="{{ $name }}"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
<div class="relative">
    @if ($icon)
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="{{ $viewbox ?? '0 0 20 20' }}">
                {!! $icon !!}
            </svg>
        </div>
    @endif
    <input type="{{ $type }}" id="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full @if($icon) ps-10 @endif p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 {{ $errors->has($name) ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : '' }}"
        placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" />
</div>
@if ($helper)
    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">{!! $helper !!}</p>
@endif

@error($name)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
@enderror
