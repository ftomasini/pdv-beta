<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Views</title>
        <link rel="stylesheet" href="{{asset('css/principal.css')}}">
        <style>
        
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col1">
                <div class="menu">
                    <ul>
                        <li><a href="{{route('clientes.index')}}">Clientes</a></li>
                        <li><a href="">Produtos</a></li>
                        <li><a href="">Departamentos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col2">
                @yield('conteudo')
            </div> 
        </div>
   
    </body>
</html>