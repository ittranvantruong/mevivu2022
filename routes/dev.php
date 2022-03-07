<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\CustomerController;

Route::group(['prefix' => 'khach-hang', 'middleware' => ['auth', 'developer.role']], function () {

    Route::get('/', [CustomerController::class, 'index'])->name('index.customer');

    Route::get('them', [CustomerController::class, 'create'])->name('create.customer');

    Route::get('kiem-tra-thong-tin', [CustomerController::class, 'checkInfo'])->name('check.info.customer');

    Route::get('sua/{user:id}', [CustomerController::class, 'edit'])->name('edit.customer');

    Route::post('them', [CustomerController::class, 'store'])->name('store.customer');  

    Route::put('sua', [CustomerController::class, 'update'])->name('update.customer');  

});