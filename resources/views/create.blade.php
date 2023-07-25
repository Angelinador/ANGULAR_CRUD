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
    <form action="{{ route('crearVideogame') }}" method="POST">

        @csrf <!--Token de seguridad para evitar el hackeo a nuestra BD-->

        <input type="text" placeholder="nombre del videojuego" name="name">
        <!--metodo para devolver errror en caso de campo name vacio-->
        @error('name_game'){{ $message }} @enderror 
        <select name="category_id" id="">
            @foreach($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>