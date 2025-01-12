<div class="absolute top-2 right-0 transition-transform overflow-hidden z-40">
    <ul>
        @foreach ($errors->all() as $e)
            <li>
                <x-alerts.toast type="Error" message={{$e}} />
            </li>
        @endforeach
    </ul>
</div>
