<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    //$categorias = [1=>'Electronica', 2=>'Electrodomesticos',3=>'Ropa'];
    $categorias = Categoria::all();
    return view('welcome',compact('categorias') );
});


Route::get('/salir', function() {
    Auth::logout();
    return view('autenticar');     
});

Route::get('autenticar', function() {
    return view('autenticar'); 
    //buscara el archivo 'autenticar.php' o 'autenticar.blade.php' dentro de resoureces/views
});
Route::get('tablero','IncioControler@tablero');

Route::post('validar'        , 'AutenticarControler@validar');
Route::get('listar_por_categoria/{categoria_id}','ExploracionControler@listar_por');
Route::post('busqueda','ExploracionControler@busqueda');


Route::get('Categorias','CategoriasControler@index');
Route::post('Categorias','CategoriasControler@store');
Route::get('Categorias/create','CategoriasControler@create');
Route::get('Categorias/{categoria}','CategoriasControler@show');
Route::put('Categorias/{categoria}','CategoriasControler@update');
Route::delete('Categorias/{categoria}','CategoriasControler@destroy');
Route::get('Categorias/{categoria}/edit','CategoriasControler@edit');

Route::resource('Usuarios','UsuariosControler');

Route::resource('Productos','ProductosControler');

Route::resource('Revisiones', 'RevisarControler', [
    'only' => ['index', 'show', 'update']
]);

