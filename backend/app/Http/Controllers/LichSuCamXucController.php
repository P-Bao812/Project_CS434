<?php

namespace App\Http\Controllers;

use App\Http\Requests\LichSuCamXucCreateRequest;
use App\Http\Requests\LichSuCamXucUpdateRequest;
use App\Models\LichSuCamXuc;

class LichSuCamXucController extends Controller
{
    public function index()
    {
        $data = LichSuCamXuc::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(LichSuCamXucCreateRequest $request)
    {
        $data = LichSuCamXuc::create([
            'manguoidung' => $request->manguoidung,
            'macamxuc' => $request->macamxuc,
            'thoigianchon' => $request->thoigianchon,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm lịch sử cảm xúc thành công'], 200);
    }

    public function update(LichSuCamXucUpdateRequest $request)
    {
        $item = LichSuCamXuc::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy lịch sử cảm xúc'], 404);
        }

        $item->update([
            'manguoidung' => $request->manguoidung,
            'macamxuc' => $request->macamxuc,
            'thoigianchon' => $request->thoigianchon,
            'ghichu' => $request->ghichu,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật lịch sử cảm xúc thành công'], 200);
    }

    public function delete($id)
    {
        $item = LichSuCamXuc::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy lịch sử cảm xúc'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa lịch sử cảm xúc thành công'], 200);
    }
}
