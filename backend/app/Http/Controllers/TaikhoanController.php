<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiKhoanCreateRequest;
use App\Http\Requests\TaiKhoanLoginRequest;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaikhoanController extends Controller
{
    public function index()
    {
        $data = Taikhoan::all();
        return response()->json(['status' =>  1, 'data' => $data], 200);
    }
    public function create(TaiKhoanCreateRequest $request)
    {
        $data = Taikhoan::create([
            'emaildangnhap'   => $request->emaildangnhap,
            'manguoidung'     => $request->manguoidung,
            'password'         => bcrypt($request->password),
            'trangthai'       => $request->trangthai,
            'lannhapcuoi' => $request->lannhapcuoi,
        ]);
        return response()->json(['status' => 1, 'data' => $data], 200);
    }
    public function changeStatus(Request $request)
    {
        $user = Taikhoan::find($request->id);
        if (!$user) {
            return response()->json(['status' => 0, 'message' => 'không tìm thấy tài khoản'], 401);
        }
        $user->trangthai  = $request->trangthai;
        $user->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái thành công'], 200);
    }
    public function delete(Request $request, $id)
    {
        $user = Taikhoan::find($id);
        if (!$user) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy tài khoản'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa đơn tài khoản thành công'
        ], 200);
    }
    public function login(TaiKhoanLoginRequest $request)
    {
        $user = Auth::guard('taikhoan')->attempt(
            [
                'emaildangnhap' => $request->emaildangnhap,
                'password' => $request->password
            ]
        );
        if ($user) {
            $user = Auth::guard('taikhoan')->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'status'    => 1,
                'message'   => 'Đăng nhập thành công',
                'token'     => $token,
                'user'      => $user
            ], 200);
        } else {
            return response()->json(['status' => 0, 'message' => 'Đăng nhập thất bại'], 401);
        }
    }
    public function checkToken()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            return response()->json(['status' => 1, 'data' => $user], 200);
        } else {
            return response()->json(['status' => 0, 'message' => 'Token không hợp lệ'], 401);
        }
    }
    public function logOut()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['status' => 1, "message" => 'Đăng xuất thành công'], 200);
        }
        return response()->json(['status' => 0, 'message' => 'Đăng xuất thất bại'], 401);
    }
    public function logOutAll()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json(['status' => 1, "message" => 'Đăng xuất thành công'], 200);
        } else {
            return response()->json(['status' => 0, 'message' => 'Đăng xuất thất bại'], 401);
        }
    }

    public function signUp(TaiKhoanCreateRequest $request)
    {
        return $this->create($request);
    }
}
