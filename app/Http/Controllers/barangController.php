<?php

namespace App\Http\Controllers;

use App\Http\Resources\barangResource;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class barangController extends Controller
{
    public function index()
    {
        $barang = barangModel::latest()->paginate(5);

        return new barangResource(true, 'List Data Barang', $barang);
    }
    public function store(Request $request)
    {
        $data = [
            'jenis_barang' => $request->jenis_barang,
            'nm_barang' => $request->nm_barang,
            'jml_barang' => $request->jml_barang,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'ket_barang' => $request->ket_barang
        ];
        $validator = Validator::make($request->all(), [
            'jenis_barang' => 'required',
            'nm_barang' => 'required',
            'jml_barang' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'ket_barang' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        barangModel::create($data);

        return new barangResource(true, 'data created', $data);
    }
    public function show(barangModel $barang)
    {
        return new barangResource(true, 'Barang list', $barang);
    }
    public function update(Request $request, barangModel $barang)
    {
        $data = [
            'jenis_barang' => $request->jenis_barang,
            'nm_barang' => $request->nm_barang,
            'jml_barang' => $request->jml_barang,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'ket_barang' => $request->ket_barang
        ];
        $validator = Validator::make($request->all(), [
            'jenis_barang' => 'required',
            'nm_barang' => 'required',
            'jml_barang' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'ket_barang' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang->update($data);

        return new barangResource(true, 'Data Update', $data);
    }
    public function destroy(barangModel $barang)
    {
        $barang->delete();
        return new barangResource(true, 'Data Deleted', $barang);
    }
}
