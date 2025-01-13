@php
    $messageTypes = ['Success', 'Warning', 'Info', 'Debug'];
@endphp

<div class="absolute top-20 right-0 transition-transform overflow-hidden z-40">
    <ul>
        {{-- Render validation errors --}}
        @foreach ($errors->all() as $error)
            <li>
                <x-alerts.toast type="Error" :message="$error" />
            </li>
        @endforeach

        {{-- Render session alerts --}}
        @foreach ($alerts as $type => $messages)
            @foreach ($messages as $message)
                <li>
                    <x-alerts.toast :type="$type" :message="$message" />
                </li>
            @endforeach
        @endforeach
    </ul>
</div>
