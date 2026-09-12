<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhieuGoiYCreateRequest;
use App\Http\Requests\PhieuGoiYUpdateRequest;
use App\Models\PhieuGoiY;

class PhieuGoiYController extends Controller
{
    public function index()
    {
        $data = PhieuGoiY::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(PhieuGoiYCreateRequest $request)
    {
        $data = PhieuGoiY::create([
            'manguoidung' => $request->manguoidung,
            'noidungnhap' => $request->noidungnhap,
            'thoigiangoiy' => $request->thoigiangoiy,
            'loaigoiy' => $request->loaigoiy,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm phiếu gợi ý thành công'], 200);
    }

    public function update(PhieuGoiYUpdateRequest $request)
    {
        $item = PhieuGoiY::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy phiếu gợi ý'], 404);
        }

        $item->update([
            'manguoidung' => $request->manguoidung,
            'noidungnhap' => $request->noidungnhap,
            'thoigiangoiy' => $request->thoigiangoiy,
            'loaigoiy' => $request->loaigoiy,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật phiếu gợi ý thành công'], 200);
    }

    public function delete($id)
    {
        $item = PhieuGoiY::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy phiếu gợi ý'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa phiếu gợi ý thành công'], 200);
    }
}
