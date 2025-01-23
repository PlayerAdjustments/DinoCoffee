{{-- Collapse: One item at a time can be opened ; Open: Multiple items at a time can be opened --}}
<div id="{{ $id }}" data-accordion="{{ $collapse ? 'collapse' : 'open' }}">
    {{$slot}}
</div>
