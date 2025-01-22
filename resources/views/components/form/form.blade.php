<form class="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
    @csrf
    {{-- Add the method if its not GET or POST --}}
    @if (!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
