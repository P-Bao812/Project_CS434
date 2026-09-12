<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonAnDaLuuCreateRequest;
use App\Http\Requests\MonAnDaLuuUpdateRequest;
use App\Models\MonAnDaLuu;

class MonAnDaLuuController extends Controller
{
    public function index()
    {
        $data = MonAnDaLuu::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(MonAnDaLuuCreateRequest $request)
    {
        $data = MonAnDaLuu::create([
            'manguoidung' => $request->manguoidung,
            'mamonan' => $request->mamonan,
            'ngayluu' => $request->ngayluu,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm món ăn đã lưu thành công'], 200);
    }

    public function update(MonAnDaLuuUpdateRequest $request)
    {
        $item = MonAnDaLuu::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy món ăn đã lưu'], 404);
        }

        $item->update([
            'manguoidung' => $request->manguoidung,
            'mamonan' => $request->mamonan,
            'ngayluu' => $request->ngayluu,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật món ăn đã lưu thành công'], 200);
    }

    public function delete($id)
    {
        $item = MonAnDaLuu::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy món ăn đã lưu'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa món ăn đã lưu thành công'], 200);
    }
}
