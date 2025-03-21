<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title","Workopia | Find lists Jobs")</title>
  
</head>
<body class="bg-gray-100">

    {{-- forma de incluir partials FORMA PREVIA DE REALIZAR COMPONENTES --}}
    {{-- @include("partials.navbar") --}}

    <x-header/>

    <main class="container mx-auto p-4 mt-4">
        @yield("content")

    </main>

</body>
</html>