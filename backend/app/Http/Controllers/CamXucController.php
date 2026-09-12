<?php

namespace App\Http\Controllers;

use App\Http\Requests\CamXucCreateRequest;
use App\Http\Requests\CamXucUpdateRequest;
use App\Models\CamXuc;

class CamXucController extends Controller
{
    public function index()
    {
        $data = CamXuc::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(CamXucCreateRequest $request)
    {
        $data = CamXuc::create([
            'tencamxuc' => $request->tencamxuc,
            'mota' => $request->mota,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm cảm xúc thành công'], 200);
    }

    public function update(CamXucUpdateRequest $request)
    {
        $item = CamXuc::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy cảm xúc'], 404);
        }

        $item->update([
            'tencamxuc' => $request->tencamxuc,
            'mota' => $request->mota,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật cảm xúc thành công'], 200);
    }

    public function delete($id)
    {
        $item = CamXuc::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy cảm xúc'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa cảm xúc thành công'], 200);
    }
}
