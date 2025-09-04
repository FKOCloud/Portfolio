<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TypertitleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Hero;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'] )-> name('home');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
});

require __DIR__.'/auth.php';

/**admin routes   */
Route::group(['middleware' => ['auth'],'prefix' => 'admin','as' => 'admin.'], function() {

Route::resource('Hero',HeroController::class);
Route::resource('Typertitle',TypertitleController::class);

});


