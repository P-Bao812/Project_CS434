<?php

namespace App\Http\Controllers;

use App\Http\Requests\NguoiDungCreateRequest;
use App\Http\Requests\NguoiDungUpdateRequest;
use App\Models\NguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function index()
    {
        $user = NguoiDung::join('taikhoans', 'nguoi_dungs.id', '=', 'taikhoans.manguoidung')
            ->select('*')
            ->get();
        return response()->json([
            'status' => 1,
            'data' => $user
        ], 200);
    }
    public function create(NguoiDungCreateRequest $request)
    {
        $user = NguoiDung::create([
            'hoten'        => $request->hoten,
            'tenhienthi'   => $request->tenhienthi,
            'gioithieungan' => $request->gioithieungan,
            'emaillienhe'  => $request->emaillienhe,
            'sodienthoai'  => $request->sodienthoai,
            'ngaysinh'     => $request->ngaysinh,
            'diachi'       => $request->diachi,
            'anhdaidien'   => $request->anhdaidien,
        ]);
        return response()->json([
            'status' => 1,
            'data' => $user,
            'message' => 'Thêm thông tin thành công'
        ], 200);
    }
    public function upDate(NguoiDungUpdateRequest $request)
    {
        $user = NguoiDung::where('id', $request->id)->update([
            'hoten'        => $request->hoten,
            'tenhienthi'   => $request->tenhienthi,
            'gioithieungan' => $request->gioithieungan,
            'emaillienhe'  => $request->emaillienhe,
            'sodienthoai'  => $request->sodienthoai,
            'ngaysinh'     => $request->ngaysinh,
            'diachi'       => $request->diachi,
            'anhdaidien'   => $request->anhdaidien,
        ]);
        return response()->json([
            'status' => 1,
            'data' => $user,
            'message' => 'Cập nhât thông tin thành công'
        ], 200);
    }
}
