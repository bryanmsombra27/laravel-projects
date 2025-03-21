<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Workopia | Find lists Jobs" }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
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
        {{$slot}}

    </main>

    
   
    <script src="{{asset("js/script.js")}}" ></script>
</body>
</html>