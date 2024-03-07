<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\Bibliotecario\LibroController;
use App\Http\Controllers\Bibliotecario\ReclamoController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {

    //Cualquier Usuario
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    //Login
    Route::view('/', 'auth.login')->name('login');
    
    //Bibliotecario

        Route::get('/Libros', function () {
            return view('libros');
        })->middleware(['auth'])->name('libros');
        
        Route::get('/Libros', LibroController::class .'@index');
        Route::post('/Libros', LibroController::class .'@store')
                    ->name('libros');

        Route::get('/Reclamo', function () {
            return view('Bibliotecario.reclamo');
        })->middleware(['auth'])->name('reclamo');

        Route::get('/Reclamo', ReclamoController::class .'@index');
        Route::post('/Reclamo', ReclamoController::class .'@store')
                ->name('reclamo');

    
    //Administrador
    Route::get('/Roles', function () {
        return view('Administrador.Roles');
    })->middleware(['auth'])->name('roles');

    


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
