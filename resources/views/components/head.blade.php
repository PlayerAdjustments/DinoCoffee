@php
    $title = "UniModelo - Sistema Oyentes";
    $description = "Sistema de administración escolar para oyentes de la universidad Modelo, campus Mérida.";
    $image = asset('favicon.ico');
    $url = url('/');
@endphp

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$title}}</title>
<meta name="description" content={{$description}}>
<meta name="robots" content="index, follow">

<!-- Open Graph Meta Tags (for social media) -->
<meta property="og:title" content={{$title}} />
<meta property="og:description" content={{$description}} />
<meta property="og:image" content={{$image}} />
<meta property="og:url" content={{$url}} />
<meta property="og:type" content="website" />

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content={{$title}} />
<meta name="twitter:description" content={{$description}} />
<meta name="twitter:image" content={{$image}} />

<!-- Cannonical Link (prevents duplicate content) -->
<link rel="cannonical" href={{$url}} />

<!-- Favicon -->
<link rel="icon" type="image/svg+xml" href={{ asset('favicon.ico') }}/>

<!-- Flowbite imports -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

<!-- Other resources -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
