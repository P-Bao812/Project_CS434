<?php

namespace App\Http\Controllers;

use App\Http\Requests\CongThucCreateRequest;
use App\Http\Requests\CongThucUpdateRequest;
use App\Models\CongThuc;

class CongThucController extends Controller
{
    public function index()
    {
        $data = CongThuc::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(CongThucCreateRequest $request)
    {
        $data = CongThuc::create([
            'mamonan' => $request->mamonan,
            'huongdannau' => $request->huongdannau,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm công thức thành công'], 200);
    }

    public function update(CongThucUpdateRequest $request)
    {
        $item = CongThuc::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy công thức'], 404);
        }

        $item->update([
            'mamonan' => $request->mamonan,
            'huongdannau' => $request->huongdannau,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật công thức thành công'], 200);
    }

    public function delete($id)
    {
        $item = CongThuc::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy công thức'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa công thức thành công'], 200);
    }
}
