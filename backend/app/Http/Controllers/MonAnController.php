<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonAnCreateRequest;
use App\Http\Requests\MonAnUpdateRequest;
use App\Models\MonAn;

class MonAnController extends Controller
{
    public function index()
    {
        $data = MonAn::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(MonAnCreateRequest $request)
    {
        $data = MonAn::create([
            'madanhmuc' => $request->madanhmuc,
            'tenmonan' => $request->tenmonan,
            'mota' => $request->mota,
            'hinhanh' => $request->hinhanh,
            'dokho' => $request->dokho,
            'thoigiannau' => $request->thoigiannau,
            'khauphanan' => $request->khauphanan,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm món ăn thành công'], 200);
    }

    public function update(MonAnUpdateRequest $request)
    {
        $item = MonAn::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy món ăn'], 404);
        }

        $item->update([
            'madanhmuc' => $request->madanhmuc,
            'tenmonan' => $request->tenmonan,
            'mota' => $request->mota,
            'hinhanh' => $request->hinhanh,
            'dokho' => $request->dokho,
            'thoigiannau' => $request->thoigiannau,
            'khauphanan' => $request->khauphanan,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật món ăn thành công'], 200);
    }

    public function delete($id)
    {
        $item = MonAn::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy món ăn'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa món ăn thành công'], 200);
    }
}
