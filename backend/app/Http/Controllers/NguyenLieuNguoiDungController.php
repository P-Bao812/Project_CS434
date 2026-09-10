<?php

namespace App\Http\Controllers;

use App\Http\Requests\NguyenLieuNguoiDungCreateRequest;
use App\Http\Requests\NguyenLieuNguoiDungUpdateRequest;
use App\Models\NguyenLieuNguoiDung;

class NguyenLieuNguoiDungController extends Controller
{
    public function index()
    {
        $data = NguyenLieuNguoiDung::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(NguyenLieuNguoiDungCreateRequest $request)
    {
        $data = NguyenLieuNguoiDung::create([
            'manguoidung' => $request->manguoidung,
            'manguyenlieu' => $request->manguyenlieu,
            'soluong' => $request->soluong,
            'donvi' => $request->donvi,
            'ngaycapnhat' => $request->ngaycapnhat,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm nguyên liệu người dùng thành công'], 200);
    }

    public function update(NguyenLieuNguoiDungUpdateRequest $request)
    {
        $item = NguyenLieuNguoiDung::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy nguyên liệu người dùng'], 404);
        }

        $item->update([
            'manguoidung' => $request->manguoidung,
            'manguyenlieu' => $request->manguyenlieu,
            'soluong' => $request->soluong,
            'donvi' => $request->donvi,
            'ngaycapnhat' => $request->ngaycapnhat,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật nguyên liệu người dùng thành công'], 200);
    }

    public function delete($id)
    {
        $item = NguyenLieuNguoiDung::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy nguyên liệu người dùng'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa nguyên liệu người dùng thành công'], 200);
    }
}
