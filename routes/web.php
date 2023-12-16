<?php

use Illuminate\Support\Facades\Route;

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
    return view('inicio');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
 return view('register');
})->name('register');

Route::view('/inicio', 'inicio');
Route::view('/preguntasfrecuentes', 'preguntasfrecuentes');
Route::view('/nosotros', 'nosotros');
Route::view('/contacto', 'contacto');
Route::view('/artista', 'artista');
Route::view('/inicioadmin', 'inicioadmin');



Use App\Http\Controllers\ArtistaController;
Route::get( '/artista', [ ArtistaController::class, 'artista' ] );
Route::get( '/mostrarArtista/{idArtista}', [ ArtistaController::class, 'mostrar' ] );
Route::middleware(['auth:sanctum', 'verified'])
->get('/adminArtistas',[ ArtistaController::class, 'index'])
->name('adminArtistas');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarArtista', [ ArtistaController::class, 'create' ] )->name('agregarArtista');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregarArtista', [ ArtistaController::class, 'store' ])->name('agregarArtista');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarArtista/{id}', [ ArtistaController::class, 'edit' ])->name('modificarArtista');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificarArtista', [ ArtistaController::class, 'update' ])->name('modificarArtista');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarArtista/{id}', [ ArtistaController::class, 'confirmar' ] )->name('eliminarArtista');
Route::middleware(['auth:sanctum', 'verified'])->delete('/eliminarArtista', [ ArtistaController::class, 'destroy' ] )->name('eliminarArtista');




use App\Http\Controllers\TipoController;
Route::middleware(['auth:sanctum', 'verified'])
->get('/adminTipos',[ TipoController::class, 'index'])
->name('adminTipos');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarTipo', [ TipoController::class, 'create' ] )->name('agregarTipo');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregarTipo', [ TipoController::class, 'store' ])->name('agregarTipo');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarTipo/{id}', [ TipoController::class, 'edit' ])->name('modificarTipo');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificarTipo', [ TipoController::class, 'update' ])->name('modificarTipo');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarTipo/{id}', [ TipoController::class, 'confirmar' ] )->name('eliminarTipo');
Route::middleware(['auth:sanctum', 'verified'])->delete('/eliminarTipo', [ TipoController::class, 'destroy' ] )->name('eliminarTipo');


use App\Http\Controllers\ProductoController;
Route::get( '/inicio', [ ProductoController::class, 'inicio' ] );
Route::get( '/', [ ProductoController::class, 'inicio' ] );
Route::get( '/acustico', [ ProductoController::class, 'acustico' ] );
Route::get( '/guitarra&acustica', [ ProductoController::class, 'guitarraacustica' ] );
Route::get( '/bajo&acustico', [ ProductoController::class, 'bajoacustico' ] );
Route::get( '/ukelele&acustico', [ ProductoController::class, 'ukeleleacustico' ] );
Route::get( '/electrico', [ ProductoController::class, 'electrico' ] );
Route::get( '/guitarra&electrica', [ ProductoController::class, 'guitarraelectrica' ] );
Route::get( '/bajo&electrico', [ ProductoController::class, 'bajoelectrico' ] );
Route::get( '/inicio&id/{id}', [ ProductoController::class, 'mostrar' ] );
Route::middleware(['auth:sanctum', 'verified'])
->get('/adminProductos',[ ProductoController::class, 'index'])
->name('adminProductos');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarProducto', [ ProductoController::class, 'create' ] )->name('agregarProducto');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregarProducto', [ ProductoController::class, 'store' ])->name('agregarProducto');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarProducto/{id}', [ ProductoController::class, 'edit' ])->name('modificarProducto');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificarProducto', [ ProductoController::class, 'update' ])->name('modificarProducto');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarProducto/{id}', [ ProductoController::class, 'confirmar' ] )->name('eliminarProducto');
Route::middleware(['auth:sanctum', 'verified'])->delete('/eliminarProducto', [ ProductoController::class, 'destroy' ] )->name('eliminarProducto');
