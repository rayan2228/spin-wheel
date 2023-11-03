<?php

use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
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

Route::get('/', [ParticipantsController::class, 'get_participants']);
Route::post('/', [ParticipantsController::class, 'participants_result']);
Route::post('/remove', [ParticipantsController::class, 'participants_remove']);
Route::post('/removeAll', [ParticipantsController::class, 'participants_removeAll']);

Route::get('/dashboard', [ParticipantsController::class, 'participants_list'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource("participants", ParticipantsController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('settings', [SettingsController::class, "update"])->name("settings");
    Route::post('settingslimit', [SettingsController::class, "updatelimit"])->name("settingslimit");
});



require __DIR__ . '/auth.php';
