<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Manager\DevController;

Route::group(['prefix' => 'ky-thuat-vien', 'middleware' => ['auth', 'admin.role']], function () {

    Route::get('/', [DevController::class, 'index'])->name('index.dev');

    Route::get('them', [DevController::class, 'create'])->name('create.dev');
    Route::get('sua/{user:id}', [DevController::class, 'edit'])->name('edit.dev');

    Route::post('them', [DevController::class, 'store'])->name('store.dev');  

    Route::put('sua', [DevController::class, 'update'])->name('update.dev');  

});