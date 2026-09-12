<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhGiaCreateRequest;
use App\Http\Requests\DanhGiaUpdateRequest;
use App\Models\DanhGia;

class DanhGiaController extends Controller
{
    public function index()
    {
        $data = DanhGia::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(DanhGiaCreateRequest $request)
    {
        $data = DanhGia::create([
            'mamonan' => $request->mamonan,
            'manguoidung' => $request->manguoidung,
            'sosao' => $request->sosao,
            'binhluan' => $request->binhluan,
            'ngaydanhgia' => $request->ngaydanhgia,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm đánh giá thành công'], 200);
    }

    public function update(DanhGiaUpdateRequest $request)
    {
        $item = DanhGia::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy đánh giá'], 404);
        }

        $item->update([
            'mamonan' => $request->mamonan,
            'manguoidung' => $request->manguoidung,
            'sosao' => $request->sosao,
            'binhluan' => $request->binhluan,
            'ngaydanhgia' => $request->ngaydanhgia,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật đánh giá thành công'], 200);
    }

    public function delete($id)
    {
        $item = DanhGia::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy đánh giá'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa đánh giá thành công'], 200);
    }
}
