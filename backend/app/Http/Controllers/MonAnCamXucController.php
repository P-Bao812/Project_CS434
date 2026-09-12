<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonAnCamXucCreateRequest;
use App\Http\Requests\MonAnCamXucUpdateRequest;
use App\Models\MonAnCamXuc;

class MonAnCamXucController extends Controller
{
    public function index()
    {
        $data = MonAnCamXuc::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(MonAnCamXucCreateRequest $request)
    {
        $data = MonAnCamXuc::create([
            'macamxuc' => $request->macamxuc,
            'mamonan' => $request->mamonan,
            'mucdophuhop' => $request->mucdophuhop,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm món ăn cảm xúc thành công'], 200);
    }

    public function update(MonAnCamXucUpdateRequest $request)
    {
        $item = MonAnCamXuc::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy món ăn cảm xúc'], 404);
        }

        $item->update([
            'macamxuc' => $request->macamxuc,
            'mamonan' => $request->mamonan,
            'mucdophuhop' => $request->mucdophuhop,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật món ăn cảm xúc thành công'], 200);
    }

    public function delete($id)
    {
        $item = MonAnCamXuc::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy món ăn cảm xúc'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa món ăn cảm xúc thành công'], 200);
    }
}
