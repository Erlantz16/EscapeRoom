<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuntuacionesController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/destroyAdmin/{user}', [ProfileController::class, 'destroyAdmin'])->name('profile.destroyAdmin');


});
Route::get('/', [PuntuacionesController::class, 'portada'])->name('portada');

Route::get('/portada', [PuntuacionesController::class, 'portada'])->name('portada');

Route::get('/juegos3', [PuntuacionesController::class, 'verificarPuntuacion'])->name('juegos3');
Route::get('/juegos4', [PuntuacionesController::class, 'verificarPuntuacion'])->name('juegos4');
Route::get('/juegos1', [PuntuacionesController::class, 'verificarPuntuacion'])->name('juegos1');

Route::get('/actualizar-puntuacion', [PuntuacionesController::class, 'actualizarPuntuacion'])->name('actualizar.puntuacion');


Route::get('/juegos1', function () {
    return view('juegos1');
})->name('juegos1');


Route::get('/juegos4', function () {
    return view('juegos4');
})->name('juegos4');
Route::get('/juegos5', function () {
    return view('juegos5');
})->name('juegos5');




Route::get('/historia', function () {
    return view('historia');
})->name('historia');

Route::post('/reiniciar-puntuacion/{usuario}', [PuntuacionesController::class, 'reiniciar'])->name('reiniciar.puntuacion');


// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/ErabiltzaileKudeaketa', [ProfileController::class, 'showKudeatu'])->name('ErabiltzaileKudeaketa');
Route::put('/ErabiltzaileKudeaketa/guardar/{user}', [ProfileController::class, 'update'])->name('guardar-cambios');

Route::get('/segundaPrueba', function () {
    return view('segundo-juego');
})->name('segundo-juego');
Route::get('/kontaktua', function () {
    return view('kontaktua');
})->name('kontaktua');
Route::get('clasificacion', [PuntuacionesController::class, 'index'] )->name('clasificacion');
Route::get('/admin', [ProfileController::class, 'admin'] )->name('admin');


Route::get('/perfil', [ProfileController::class, 'show'])->middleware('auth')->name('perfil.show');
Route::put('/usuarios/update-rol', [ProfileController::class, 'updateRol'])->name('usuarios.updateRol');

Route::delete('/destroyAdmin', [ProfileController::class, 'destroyAdmin'])->name('destroyAdmin');

require __DIR__.'/auth.php';


