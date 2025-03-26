<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Workopia | Find lists Jobs" }}</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @vite('resources/css/app.css')
</head> 
<body class="bg-gray-100">

    {{-- forma de incluir partials FORMA PREVIA DE REALIZAR COMPONENTES --}}
    {{-- @include("partials.navbar") --}}

    <x-header/>

    @if( request() -> is("/"))
    <x-hero/>
    <x-top-banner/>
     @endif

    <main class="container mx-auto p-4 mt-4">
{{-- display alert messages --}}
        @if (session('success'))
        <x-alert  type="success" message="{{session('success')}}" timeout="2000" />
        @endif

        @if (session('error'))
        <x-alert  type="error" message="{{session('error')}}" timeout="2000" />
        @endif


        {{$slot}}

    </main>

    
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- <script src="{{asset("js/script.js")}}" ></script> --}}
</body>
</html>