<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Models\Hero;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth'],'prefix' => 'admin','as' => 'admin.'], function() {

Route::resource('Hero',HeroController::class);


});


