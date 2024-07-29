<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Liga;
use Illuminate\Http\Request;
use Validator;

class LigaController extends Controller
{
    public function index()
    {
        $liga = Liga::latest()->get();
        $res = [
            'success' => true,
            'message' => 'Daftar Liga Sepak Bola',
            'data' => $liga,
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'Liga' => 'required|unique:ligas',
            'Negara' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validasi gagal',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $liga = new Liga;
            $liga->Liga = $request->Liga;
            $liga->Negara = $request->Negara;
            $liga->save();
            return response()->json([
                'success' => true,
                'message' => 'data liga berhasil dibuat',
                'data' => $liga,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'terjadi kesalahan',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $liga = Liga::find($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail Liga',
                'data' => $liga,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan',
                'errors' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'Liga' => 'required',
            'Negara' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validasi gagal',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $liga = Liga::findOrFail($id);
            $liga->Liga = $request->Liga;
            $liga->Negara = $request->Negara;
            $liga->save();
            return response()->json([
                'success' => true,
                'message' => 'data liga berhasil dibuat',
                'data' => $liga,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'terjadi kesalahan',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $liga = Liga::findOrFail($id);
            $liga->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data ' . $liga->Liga . ' berhasul dihapus',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan',
                'errors' => $e->getMessage(),
            ], 404);
        }
    }
}
