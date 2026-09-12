<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucCreateRequest;
use App\Http\Requests\DanhMucUpdateRequest;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    public function index()
    {
        $data = DanhMuc::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(DanhMucCreateRequest $request)
    {
        $data = DanhMuc::create([
            'tendanhmuc' => $request->tendanhmuc,
            'mota' => $request->mota,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm danh mục thành công'], 200);
    }

    public function update(DanhMucUpdateRequest $request)
    {
        $item = DanhMuc::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy danh mục'], 404);
        }

        $item->update([
            'tendanhmuc' => $request->tendanhmuc,
            'mota' => $request->mota,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật danh mục thành công'], 200);
    }

    public function delete($id)
    {
        $item = DanhMuc::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy danh mục'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa danh mục thành công'], 200);
    }
}
