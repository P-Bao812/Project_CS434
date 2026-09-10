<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChiTietPhieuGoiYCreateRequest;
use App\Http\Requests\ChiTietPhieuGoiYUpdateRequest;
use App\Models\ChiTietPhieuGoiY;

class ChiTietPhieuGoiYController extends Controller
{
    public function index()
    {
        $data = ChiTietPhieuGoiY::all();
        return response()->json(['status' => 1, 'data' => $data], 200);
    }

    public function create(ChiTietPhieuGoiYCreateRequest $request)
    {
        $data = ChiTietPhieuGoiY::create([
            'mamonan' => $request->mamonan,
            'maphieugoiy' => $request->maphieugoiy,
            'dophuhop' => $request->dophuhop,
            'lydogoiy' => $request->lydogoiy,
            'thutuhienthi' => $request->thutuhienthi,
            'songuyelieucosan' => $request->songuyelieucosan,
            'tongnguyenlieucan' => $request->tongnguyenlieucan,
            'tylephuhop' => $request->tylephuhop,
        ]);

        return response()->json(['status' => 1, 'data' => $data, 'message' => 'Thêm chi tiết phiếu gợi ý thành công'], 200);
    }

    public function update(ChiTietPhieuGoiYUpdateRequest $request)
    {
        $item = ChiTietPhieuGoiY::find($request->id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy chi tiết phiếu gợi ý'], 404);
        }

        $item->update([
            'mamonan' => $request->mamonan,
            'maphieugoiy' => $request->maphieugoiy,
            'dophuhop' => $request->dophuhop,
            'lydogoiy' => $request->lydogoiy,
            'thutuhienthi' => $request->thutuhienthi,
            'songuyelieucosan' => $request->songuyelieucosan,
            'tongnguyenlieucan' => $request->tongnguyenlieucan,
            'tylephuhop' => $request->tylephuhop,
        ]);

        return response()->json(['status' => 1, 'data' => $item, 'message' => 'Cập nhật chi tiết phiếu gợi ý thành công'], 200);
    }

    public function delete($id)
    {
        $item = ChiTietPhieuGoiY::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'message' => 'Không tìm thấy chi tiết phiếu gợi ý'], 404);
        }

        $item->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa chi tiết phiếu gợi ý thành công'], 200);
    }
}
