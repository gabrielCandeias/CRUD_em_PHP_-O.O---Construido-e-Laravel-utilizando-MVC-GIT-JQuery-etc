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
use App\Http\Controllers\SystemController;

Route::get('load_funcoes',[SystemController::class, 'load_funcoes'])->name('load_funcoes');

Route::get('/', [SystemController::class, 'index'])->middleware(['auth']);
 
// A rota create esta no arquivo auth.php acima

Route::put('/auth/update/{id}', [SystemController::class, 'updateuser'])->middleware(['auth']);

Route::get('/auth/edituser', [SystemController::class, 'edituser'])->middleware(['auth']);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';

// Rotas do ADM

Route::middleware(['auth', 'cargo:2'])->group(function () {

    Route::get('/auth/adiministracao', [SystemController::class, 'adiministracao'])->middleware(['auth']);

    Route::delete('/auth/adiministracao/{id}', [SystemController::class, 'destroy'])->middleware(['auth']);

    Route::get('/auth/adiministracao/edit/{id}', [SystemController::class, 'edit'])->middleware(['auth']);

    Route::put('/auth/adiministracao/update/{id}', [SystemController::class, 'update'])->middleware(['auth']);
});
