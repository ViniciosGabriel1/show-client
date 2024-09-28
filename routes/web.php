<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
Route::get('dashboard/clientes', [ClientesController::class, 'create'])->name('dashboard.create');
// Route::post('dashboard/pegarClientesCategoria/{categoria}', [ClientesController::class, 'pegarClientesCategoria'])->name('dashboard.cliente_categoria');
Route::post('dashboard/carregarEstrutura', [ClientesController::class, 'carregarEstrutura'])->name('dashboard.carregarEstrutura');
Route::post('dashboard/excluirCliente', [ClientesController::class, 'excluirCliente'])->name('dashboard.excluirCliente');
Route::post('dashboard/atualizarCliente', [ClientesController::class, 'atualizarCliente'])->name('dashboard.atualizarCliente');
// Route::delete('dashboard/ajax', [ClientesController::class, 'ajax'])->name('dashboard.ajax');
Route::post('dashboard/importClientes', [ClientesController::class, 'importClientes'])->name('dashboard.importClientes');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
