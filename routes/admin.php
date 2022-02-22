<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Manager\DevController;

Route::group(['middleware' => ['admin']], function () {

    Route::get('danh-sach-ky-thuat-vien', [DevController::class, 'index'])->name('index.dev');

    Route::get('them-ky-thuat-vien', [DevController::class, 'create'])->name('create.dev');
    Route::get('sua-ky-thuat-vien/{user:id}', [DevController::class, 'edit'])->name('edit.dev');

    Route::post('them-ky-thuat-vien', [DevController::class, 'store'])->name('store.dev');  

    Route::put('sua-ky-thuat-vien', [DevController::class, 'update'])->name('update.dev');  

});