<?php

use App\Http\Controllers\Admin\{
    SupportController
};
use Illuminate\Support\Facades\Route;



Route::prefix('/supports')->group(function() { 
    Route::delete('/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
    Route::put('/{id}', [SupportController::class, 'update'])->name('supports.update');
    Route::get('/edit/{id}', [SupportController::class, 'edit'])->name('supports.edit');
    Route::get('/create', [SupportController::class, 'create'])->name('supports.create');
    Route::get('/{id}', [SupportController::class, 'show'])->name('supports.show');
    Route::post('/', [SupportController::class, 'store'])->name('supports.store');
    Route::get('/', [SupportController::class, 'index'])->name('supports.index');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('site.contact');
});
