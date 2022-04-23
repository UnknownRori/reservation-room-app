<?php

use App\Http\Controllers\HotelFacilityController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomFacilityController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth.no')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/register', Register::class)->name('register');
    });
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room:no_room}', [RoomController::class, 'show'])->name('rooms.show');
// Route::get('/rooms/{room:no_room}/{roomfacility:name}', [RoomFacilityController::class, 'show'])->name('rooms.facility.show');
Route::get('/facilities', [HotelFacilityController::class, 'index'])->name('hotelfacility.index');
// Route::get('/facilities/{hotelfacility:name}', [HotelFacilityController::class, 'show'])->name('hotelfacility.show');

Route::middleware('auth')->group(function () {
    Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/user/{user}/{orders}', [OrdersController::class, 'show'])->name('user.order.show');
});

Route::middleware('auth.receptionist')->group(function () {
    Route::prefix('receptionist')->group(function () {
        Route::get('/rooms', [RoomController::class, 'index'])->name('receptionist.rooms.index');
        Route::get('/orders', [OrdersController::class, 'index'])->name('receptionist.orders.index');
    });
});

Route::middleware('auth.admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
        Route::get('/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
        Route::get('/rooms/{room:no_room}', [RoomFacilityController::class, 'create'])->name('admin.room.facility.create');
        Route::get('/facilities', [HotelFacilityController::class, 'index'])->name('admin.facility.index');
        Route::get('/facilities/create', [HotelFacilityController::class, 'create'])->name('admin.facility.create');
    });
});
