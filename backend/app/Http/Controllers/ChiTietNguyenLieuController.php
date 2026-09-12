<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChiTietNguyenLieuCreateRequest;
use App\Http\Requests\ChiTietNguyenLieuUpdateRequest;
use App\Models\ChiTietNguyenLieu;

class ChiTietNguyenLieuController extends Controller
{
    public function index()
    {
        $data = ChiTietNguyenLieu::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(ChiTietNguyenLieu $request)
    {
        $data = ChiTietNguyenLieu::create([
            'mamonan' => $request->mamonan,
            'manguyenlieu' => $request->manguyenlieu,
            'soluong' => $request->soluong,
            'donvitinh' => $request->donvitinh,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm chi tiết nguyên liệu thành công'], 200);
    }

    public function update(ChiTietNguyenLieuUpdateRequest $request)
    {
        $item = ChiTietNguyenLieu::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy chi tiết nguyên liệu'], 404);
        }

        $item->update([
            'mamonan' => $request->mamonan,
            'manguyenlieu' => $request->manguyenlieu,
            'soluong' => $request->soluong,
            'donvitinh' => $request->donvitinh,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật chi tiết nguyên liệu thành công'], 200);
    }

    public function delete($id)
    {
        $item = ChiTietNguyenLieu::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy chi tiết nguyên liệu'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa chi tiết nguyên liệu thành công'], 200);
    }
}
