<?php

use App\Http\Controllers\CamXucController;
use App\Http\Controllers\ChiTietNguyenLieuController;
use App\Http\Controllers\ChiTietPhieuGoiYController;
use App\Http\Controllers\CongThucController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LichSuCamXucController;
use App\Http\Controllers\LichSuTimKiemController;
use App\Http\Controllers\MonAnCamXucController;
use App\Http\Controllers\MonAnController;
use App\Http\Controllers\MonAnDaLuuController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\NguyenLieuController;
use App\Http\Controllers\NguyenLieuNguoiDungController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhieuGoiYController;
use App\Http\Controllers\TaiKhoanQuyenController;
use App\Http\Controllers\TaikhoanController;
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
    Route::delete('/delete/{id}', [TaikhoanController::class, 'delete']);
});

Route::prefix('nguoi-dung')->group(function () {
    Route::get('/', [NguoiDungController::class, 'index']);
    Route::post('/create', [NguoiDungController::class, 'create']);
    Route::put('/update', [NguoiDungController::class, 'update']);
});

Route::prefix('danh-muc')->group(function () {
    Route::get('/', [DanhMucController::class, 'index']);
    Route::post('/create', [DanhMucController::class, 'create']);
    Route::put('/update', [DanhMucController::class, 'update']);
    Route::delete('/delete/{id}', [DanhMucController::class, 'delete']);
});

Route::prefix('mon-an')->group(function () {
    Route::get('/', [MonAnController::class, 'index']);
    Route::post('/create', [MonAnController::class, 'create']);
    Route::put('/update', [MonAnController::class, 'update']);
    Route::delete('/delete/{id}', [MonAnController::class, 'delete']);
});

Route::prefix('phan-quyen')->group(function () {
    Route::get('/', [PhanQuyenController::class, 'index']);
    Route::post('/create', [PhanQuyenController::class, 'create']);
    Route::put('/update', [PhanQuyenController::class, 'update']);
    Route::delete('/delete/{id}', [PhanQuyenController::class, 'delete']);
});

Route::prefix('cam-xuc')->group(function () {
    Route::get('/', [CamXucController::class, 'index']);
    Route::post('/create', [CamXucController::class, 'create']);
    Route::put('/update', [CamXucController::class, 'update']);
    Route::delete('/delete/{id}', [CamXucController::class, 'delete']);
});

Route::prefix('nguyen-lieu')->group(function () {
    Route::get('/', [NguyenLieuController::class, 'index']);
    Route::post('/create', [NguyenLieuController::class, 'create']);
    Route::put('/update', [NguyenLieuController::class, 'update']);
    Route::delete('/delete/{id}', [NguyenLieuController::class, 'delete']);
});

Route::prefix('chi-tiet-nguyen-lieu')->group(function () {
    Route::get('/', [ChiTietNguyenLieuController::class, 'index']);
    Route::post('/create', [ChiTietNguyenLieuController::class, 'create']);
    Route::put('/update', [ChiTietNguyenLieuController::class, 'update']);
    Route::delete('/delete/{id}', [ChiTietNguyenLieuController::class, 'delete']);
});

Route::prefix('chi-tiet-phieu-goi-y')->group(function () {
    Route::get('/', [ChiTietPhieuGoiYController::class, 'index']);
    Route::post('/create', [ChiTietPhieuGoiYController::class, 'create']);
    Route::put('/update', [ChiTietPhieuGoiYController::class, 'update']);
    Route::delete('/delete/{id}', [ChiTietPhieuGoiYController::class, 'delete']);
});

Route::prefix('cong-thuc')->group(function () {
    Route::get('/', [CongThucController::class, 'index']);
    Route::post('/create', [CongThucController::class, 'create']);
    Route::put('/update', [CongThucController::class, 'update']);
    Route::delete('/delete/{id}', [CongThucController::class, 'delete']);
});

Route::prefix('danh-gia')->group(function () {
    Route::get('/', [DanhGiaController::class, 'index']);
    Route::post('/create', [DanhGiaController::class, 'create']);
    Route::put('/update', [DanhGiaController::class, 'update']);
    Route::delete('/delete/{id}', [DanhGiaController::class, 'delete']);
});

Route::prefix('lich-su-cam-xuc')->group(function () {
    Route::get('/', [LichSuCamXucController::class, 'index']);
    Route::post('/create', [LichSuCamXucController::class, 'create']);
    Route::put('/update', [LichSuCamXucController::class, 'update']);
    Route::delete('/delete/{id}', [LichSuCamXucController::class, 'delete']);
});

Route::prefix('lich-su-tim-kiem')->group(function () {
    Route::get('/', [LichSuTimKiemController::class, 'index']);
    Route::post('/create', [LichSuTimKiemController::class, 'create']);
    Route::put('/update', [LichSuTimKiemController::class, 'update']);
    Route::delete('/delete/{id}', [LichSuTimKiemController::class, 'delete']);
});

Route::prefix('mon-an-cam-xuc')->group(function () {
    Route::get('/', [MonAnCamXucController::class, 'index']);
    Route::post('/create', [MonAnCamXucController::class, 'create']);
    Route::put('/update', [MonAnCamXucController::class, 'update']);
    Route::delete('/delete/{id}', [MonAnCamXucController::class, 'delete']);
});

Route::prefix('mon-an-da-luu')->group(function () {
    Route::get('/', [MonAnDaLuuController::class, 'index']);
    Route::post('/create', [MonAnDaLuuController::class, 'create']);
    Route::put('/update', [MonAnDaLuuController::class, 'update']);
    Route::delete('/delete/{id}', [MonAnDaLuuController::class, 'delete']);
});

Route::prefix('nguyen-lieu-nguoi-dung')->group(function () {
    Route::get('/', [NguyenLieuNguoiDungController::class, 'index']);
    Route::post('/create', [NguyenLieuNguoiDungController::class, 'create']);
    Route::put('/update', [NguyenLieuNguoiDungController::class, 'update']);
    Route::delete('/delete/{id}', [NguyenLieuNguoiDungController::class, 'delete']);
});

Route::prefix('phieu-goi-y')->group(function () {
    Route::get('/', [PhieuGoiYController::class, 'index']);
    Route::post('/create', [PhieuGoiYController::class, 'create']);
    Route::put('/update', [PhieuGoiYController::class, 'update']);
    Route::delete('/delete/{id}', [PhieuGoiYController::class, 'delete']);
});

Route::prefix('tai-khoan-quyen')->group(function () {
    Route::get('/', [TaiKhoanQuyenController::class, 'index']);
    Route::post('/create', [TaiKhoanQuyenController::class, 'create']);
    Route::put('/update', [TaiKhoanQuyenController::class, 'update']);
    Route::delete('/delete/{id}', [TaiKhoanQuyenController::class, 'delete']);
});
