<?php

namespace App\Http\Controllers;

use App\Http\Requests\NguyenLieuCreateRequest;
use App\Http\Requests\NguyenLieuUpdateRequest;
use App\Models\NguyenLieu;

class NguyenLieuController extends Controller
{
    public function index()
    {
        $data = NguyenLieu::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(NguyenLieuCreateRequest $request)
    {
        $data = NguyenLieu::create([
            'tengnuyenlieu' => $request->tengnuyenlieu,
            'donvitinh' => $request->donvitinh,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm nguyên liệu thành công'], 200);
    }

    public function update(NguyenLieuUpdateRequest $request)
    {
        $item = NguyenLieu::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy nguyên liệu'], 404);
        }

        $item->update([
            'tengnuyenlieu' => $request->tengnuyenlieu,
            'donvitinh' => $request->donvitinh,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật nguyên liệu thành công'], 200);
    }

    public function delete($id)
    {
        $item = NguyenLieu::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy nguyên liệu'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa nguyên liệu thành công'], 200);
    }
}
