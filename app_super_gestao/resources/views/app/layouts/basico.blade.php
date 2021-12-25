<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('title')</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="{{asset('css/estilo_basico.css')}}">

    </head>
    <body>
        <div>
            @include('app.layouts._partials.topo')        
        </div>
        <div style="margin:auto">
            @yield('content')
        </div>
    </body>
</html>