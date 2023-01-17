<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PersonaController::class,'index'])->name('personas.index');

Route::get('/crear',[PersonaController::class,'create'])->name('personas.create');

Route::post('/guardar',[PersonaController::class,'store'])->name('personas.guardar');

Route::get('/{id}/editar',[PersonaController::class,'edit'])->name('personas.edit');

Route::put('/{id}/update',[PersonaController::class,'update'])->name('personas.update');

Route::get('/eliminar/{id}',[PersonaController::class,'show'])->name('personas.show');

Route::delete('/destroy/{id}',[PersonaController::class,'destroy'])->name('personas.destroy');

