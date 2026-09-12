<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhanQuyenCreateRequest;
use App\Http\Requests\PhanQuyenUpdateRequest;
use App\Models\PhanQuyen;

class PhanQuyenController extends Controller
{
    public function index()
    {
        $data = PhanQuyen::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(PhanQuyenCreateRequest $request)
    {
        $data = PhanQuyen::create([
            'tenquyen' => $request->tenquyen,
            'mota' => $request->mota,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm quyền thành công'], 200);
    }

    public function update(PhanQuyenUpdateRequest $request)
    {
        $item = PhanQuyen::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy quyền'], 404);
        }

        $item->update([
            'tenquyen' => $request->tenquyen,
            'mota' => $request->mota,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật quyền thành công'], 200);
    }

    public function delete($id)
    {
        $item = PhanQuyen::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy quyền'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa quyền thành công'], 200);
    }
}
