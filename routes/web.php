<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

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

//guests
Route::get('/guests/projects', [GuestController::class, 'index'])->name('guests.projects.index');
Route::get('/guests/projects/{project}', [GuestController::class, 'show'])->name('guests.projects.show');



//admin
Route::middleware(['auth', 'verified'])
    
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //CRUD
    Route::resource('projects',ProjectController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
