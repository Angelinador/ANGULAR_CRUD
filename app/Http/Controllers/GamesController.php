<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame; //necesitamos importar el modelo
use App\Models\Category; //necesitamos importar el modelo
use App\Http\Requests\storeVideogame;
use App\Mail\VideogameMail;
use Illuminate\Support\Facades\Mail;

class GamesController extends Controller
{
    public function index(){
        //$videoJuegos = array('Fifa 22', 'NBA 22', 'Mario Kart', 'Super Mario');
        $videogames = Videogame::orderBy('id','desc')->get(); //con esta instruccion traemos todos los videojuegos
        return view('index', ['games'=>$videogames]);
    }
    public function create(){
        $categorias = Category::all();
        return view('create', ['categories'=>$categorias]);
    }
    public function help($game_name, $categoria=null){
        return view('show', ['nameVideoGame'=>$game_name, 'categoryGame'=>$categoria]);
    }
    public function storeVideogame(storeVideogame $request){ //vamos a recibir datos de un formulario que se 
        //encuentran dentro de una peticion llamada request y que a su vez necesita de la validacion
        //de la clase StoreVideogame
        
        //return $request->all(); //esta instruccion envia un token

        Videogame::create($request->all());

        foreach(['20161295@itoaxaca.edu.mx'] as $recipient){
            Mail::to($recipient)->send(new VideogameMail());
        }

        return redirect()->route('games');
    }
    public function view($game_id){
        $game = Videogame::find($game_id); //esta instruccion busca el videojuego a traves de su id
        $categorias = Category::all();
        return view('update', ['categories'=>$categorias, 'game'=>$game]);
    }
    public function updateVideogame(Request $request){

        $request->validate([ //validaciones
            'name_game'=>'required|min:5|max:10'
        ]);

        $game = VideoGame::find($request->game_id);
        $game->name = $request->name_game;
        $game->category_id = $request->categoria_id;
        $game->active = 1;
        $game->save();

        return redirect()->route('games');
    }
    public function delete($game_id){
        $game = Videogame::find($game_id);
        $game->delete(); //eliminacion de videojuego
        return redirect()->route('games');
    }
}
