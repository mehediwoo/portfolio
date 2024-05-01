<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutController;

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

Route::prefix('admin/')->group(function(){

    /* Dashboard */
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    /* Slider */
    Route::get('slider',[SliderController::class,'index'])->name('slider.index');
    Route::post('slider/store',[SliderController::class,'store'])->name('slider.store');
    Route::get('slider/show',[SliderController::class,'show'])->name('slider.show');
    Route::post('slider/update',[SliderController::class,'update'])->name('slider.update');
    Route::post('slider/destroy',[SliderController::class,'destroy'])->name('slider.destroy');

    /* About */
    Route::get('about',[AboutController::class,'index'])->name('about.index');
    Route::post('about/update',[AboutController::class,'update'])->name('about.update');
});
