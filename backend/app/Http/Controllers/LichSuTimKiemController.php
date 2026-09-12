<?php

namespace App\Http\Controllers;

use App\Http\Requests\LichSuTimKiemCreateRequest;
use App\Http\Requests\LichSuTimKiemUpdateRequest;
use App\Models\LichSuTimKiem;

class LichSuTimKiemController extends Controller
{
    public function index()
    {
        $data = LichSuTimKiem::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(LichSuTimKiemCreateRequest $request)
    {
        $data = LichSuTimKiem::create([
            'manguoidung' => $request->manguoidung,
            'tukhoatimkiem' => $request->tukhoatimkiem,
            'thoigiantimkiem' => $request->thoigiantimkiem,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm lịch sử tìm kiếm thành công'], 200);
    }

    public function update(LichSuTimKiemUpdateRequest $request)
    {
        $item = LichSuTimKiem::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy lịch sử tìm kiếm'], 404);
        }

        $item->update([
            'manguoidung' => $request->manguoidung,
            'tukhoatimkiem' => $request->tukhoatimkiem,
            'thoigiantimkiem' => $request->thoigiantimkiem,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật lịch sử tìm kiếm thành công'], 200);
    }

    public function delete($id)
    {
        $item = LichSuTimKiem::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy lịch sử tìm kiếm'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa lịch sử tìm kiếm thành công'], 200);
    }
}
