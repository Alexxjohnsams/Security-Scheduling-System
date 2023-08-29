<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfficerDashboardController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\OfficersController;
use App\Http\Controllers\UserShiftController;
use App\Http\Controllers\LocationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $users = DB::table('users')
            ->select('*')
            ->where('role', '=', 'user')
            ->orderBy('created_at', 'desc')
            ->get();
            Alert::success('Success', 'You are Logged in!');
    return view('home', compact('users'));
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/user/dashboard', [OfficerDashboardController::class, 'index'])->name('user.dashboard');

Route::get('/officers', [OfficersController::class, 'index'])->name('officers');

Route::get('/shifts', [ShiftsController::class, 'index'])->name('shifts');

Route::get('/user/usershift', [UserShiftController::class, 'index'])->name('user.usershift');

Route::get('/locations', [LocationsController::class, 'index'])->name('locations');