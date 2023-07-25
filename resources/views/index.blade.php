<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vista creada en blade y llamada desde el controlador</h1>
    <p>
        <a href="{{ route('gamesCreate') }}">Nuevo videojuego</a>
    </p>
    <h2>Listado de juegos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ID CATEGORIA</th>
                <th>CREADO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
            <body>
                @forelse($games as $game)
                    <tr>
                        <th>{{ $game->id }}</th>
                        <th><a href="{{ route('viewGame', $game->id) }}"> {{ $game->name }} </a></th>
                        <th>{{ $game->category_id }}</th>
                        <th>{{ $game->created_at }}</th>
                        <th>
                            @if($game->active)
                                <span style="color : green">Activo</span>
                            @else
                                <span style="color : red">Inactivo</span>
                            @endif
                        </th>
                        <th>
                            <a href="{{ route('deleteGame', $game->id) }}">Eliminar</a> <!--llamamos al 
                        vinculo renombrado deleteGame desde web.php y nos direcciona a la funcion delete
                        ubicada en GameController.php-->
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th>Sin videojuegos</th>
                    </tr>
                @endforelse
            </body>
        </thead>
    </table>
</body> 
</html>