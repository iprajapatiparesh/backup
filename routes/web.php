<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PgController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');


// -----admin routes--------------

Route::resource('pgs', PgController::class);
Route::resource('users', UserController::class);
Route::resource('facilities', FacilityController::class);

Route::get('/check-username', [UserController::class])->name('users.checkUsername');

Route::post('/addrentdetail', [PgController::class, 'addRentdetail'])->name('addRentdetail');
Route::post('/deleterentdetail', [PgController::class, 'deleteRentdetail'])->name('deleteRentdetail');

Route::post('/update-facility', [PgController::class, 'updateFacility'])->name('updateFacility');

Route::post('/delete-image', [PgController::class, 'deleteImage'])->name('deleteImage');
Route::post('/upload-images', [PgController::class, 'uploadImages'])->name('uploadImages');


// -----admin routes--------------