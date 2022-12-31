<?php

use App\Http\Controllers\PersonasController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PersonasController::class,'index'])->name('personas.index');

Route::get('/crear',[PersonasController::class,'create'])->name('personas.create');

Route::post('/guardar',[PersonasController::class,'store'])->name('personas.guardar');

Route::get('/editar/{id}',[PersonasController::class,'edit'])->name('personas.edit');

Route::put('/update/{id}',[PersonasController::class,'update'])->name('personas.update');

Route::get('/eliminar/{id}',[PersonasController::class,'show'])->name('personas.show');

Route::delete('/destroy/{id}',[PersonasController::class,'destroy'])->name('personas.destroy');

