<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelFacilityController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomFacilityController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
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
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::get('/register', [UserController::class, 'create'])->name('register');
    });
});

Route::get('/room-type', [RoomTypeController::class, 'home'])->name('rooms.index');
Route::get('/room-type/{name}', [RoomTypeController::class, 'show'])->name('rooms.show');
Route::get('/facilities', [HotelFacilityController::class, 'home'])->name('hotelfacility.index');

Route::middleware('auth')->group(function () {
    Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/user/{user}/{orders}', [OrdersController::class, 'show'])->name('user.order.show');
    Route::get('/user/history', [OrdersController::class, 'history'])->name('user.order.history');
});

Route::middleware('auth.receptionist')->group(function () {
    Route::prefix('receptionist')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('receptionist.dashboard');

        Route::get('/rooms', [RoomController::class, 'index'])->name('receptionist.rooms.index');
        Route::post('/rooms/{id}/check-in', [RoomController::class, 'check'])->name('receptionist.rooms.checkin');
        Route::post('/rooms/{id}/check-out', [RoomController::class, 'check'])->name('receptionist.rooms.checkout');

        Route::get('/orders', [OrdersController::class, 'index'])->name('receptionist.orders.index');
        Route::delete('/orders/{id}/delete', [OrdersController::class, 'destroy'])->name('receptionist.orders.destroy');
        Route::post('/orders/{id}/check_in', [OrdersController::class, 'check_in'])->name('receptionist.orders.checkin');
        Route::post('/orders/{id}/check_out', [OrdersController::class, 'check_out'])->name('receptionist.orders.checkout');
    });
});

Route::middleware('auth.admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

        Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
        Route::get('/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
        Route::get('/rooms/{room:id}', [RoomController::class, 'edit'])->name('admin.rooms.edit');
        Route::delete('/rooms/{room:id}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');

        Route::get('/room/facilities/create', [RoomFacilityController::class, 'create'])->name('admin.room.facility.create');
        Route::get('/room/facilities', [RoomFacilityController::class, 'index'])->name('admin.room.facility.index');
        Route::get('/room/facilities/{id}/edit', [RoomFacilityController::class, 'edit'])->name('admin.room.facility.edit');
        Route::delete('/room/facilities/{id}/delete', [RoomFacilityController::class, 'destroy'])->name('admin.room.facility.destroy');

        Route::get('/hotel-facilities', [HotelFacilityController::class, 'index'])->name('admin.facility.index');
        Route::get('/hotel-facilities/create', [HotelFacilityController::class, 'create'])->name('admin.facility.create');
        Route::get('/hotel-facilities/{hotelfacility:id}/edit', [HotelFacilityController::class, 'edit'])->name('admin.facility.edit');
        Route::delete('/hotel-facilities/{hotelfacility:id}/delete', [HotelFacilityController::class, 'destroy'])->name('admin.facility.destroy');

        Route::get('/room-type', [RoomTypeController::class, 'index'])->name('admin.roomtype.index');
        Route::get('/room-type/create', [RoomTypeController::class, 'create'])->name('admin.roomtype.create');
        Route::get('/room-type/{RoomType:id}/edit', [RoomTypeController::class, 'edit'])->name('admin.roomtype.edit');
        Route::delete('/room-type/{RoomType:id}/delete', [RoomTypeController::class, 'destroy'])->name('admin.roomtype.destroy');
    });
});
