<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para la creacion de videjuego</h1>
    <p>
        <a href="{{ route('games') }}">Listar todos los juegos</a>
    </p>
    <form action="{{ route('updateVideogame') }}" method="POST">

        @csrf <!--Token de seguridad para evitar el hackeo a nuestra BD-->
        <input type="hidden" name="game_id" value="{{ $game->id }}">
        <input type="text" placeholder="nombre del videojuego" name="name_game" value="{{ $game->name }}">
        <!--metodo para devolver errror en caso de campo name vacio-->
        @error('name_game'){{ $message }} @enderror 
        <select name="categoria_id" id="">
            @foreach($categories as $item)
                <option value="{{ $item->id }}"  
                    @if($item->id == $game->category_id )
                        selected
                    @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>