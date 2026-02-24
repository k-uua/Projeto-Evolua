<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') • Evolua</title>
</head>

<body>
    @include('components.header')

    <main>
        @yield('conteudo')
    </main>

    @include('components.footer')

</body>

</html>