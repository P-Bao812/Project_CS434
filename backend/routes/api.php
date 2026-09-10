<?php

use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\TaikhoanController;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [TaikhoanController::class, 'login']);
Route::get('check-token', [TaikhoanController::class, 'checkToken']);
Route::get('logout', [TaikhoanController::class, 'logOut']);
Route::get('logout-all', [TaikhoanController::class, 'logOutAll']);
Route::post('sign-up', [TaikhoanController::class, 'signUp']);

Route::prefix('tai-khoan')->group(function () {
    Route::get('/', [TaikhoanController::class, 'index']);
    Route::post('/create', [TaikhoanController::class, 'create']);
    Route::patch('/change-status', [TaikhoanController::class, 'changeStatus']);

});
Route::prefix('nguoi-dung')->group(function () {
    Route::get('/', [NguoiDungController::class, 'index']);
    Route::post('/create', [NguoiDungController::class, 'create']);
    Route::put('/update', [NguoiDungController::class, 'update']);
});
