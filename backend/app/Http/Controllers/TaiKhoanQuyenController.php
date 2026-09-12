<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiKhoanQuyenCreateRequest;
use App\Http\Requests\TaiKhoanQuyenUpdateRequest;
use App\Models\TaiKhoan_quyen;

class TaiKhoanQuyenController extends Controller
{
    public function index()
    {
        $data = TaiKhoan_quyen::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(TaiKhoanQuyenCreateRequest $request)
    {
        $data = TaiKhoan_quyen::create([
            'mataikhoan' => $request->mataikhoan,
            'maquyen' => $request->maquyen,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm quyền tài khoản thành công'], 200);
    }

    public function update(TaiKhoanQuyenUpdateRequest $request)
    {
        $item = TaiKhoan_quyen::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy quyền tài khoản'], 404);
        }

        $item->update([
            'mataikhoan' => $request->mataikhoan,
            'maquyen' => $request->maquyen,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật quyền tài khoản thành công'], 200);
    }

    public function delete($id)
    {
        $item = TaiKhoan_quyen::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy quyền tài khoản'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa quyền tài khoản thành công'], 200);
    }
}
