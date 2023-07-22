<?php

namespace App\Http\Controllers;

use App\Http\Resources\CutiResource;
use App\Http\Resources\CutiResourceCollection;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::all();
        return new CutiResourceCollection($cuti);
    }

    public function store(Request $request)
    {
        $rules=array(
            'nomor_induk' => 'required|check_nomor_induk',
            'tanggal_cuti' => 'required',
            'lama_cuti' => 'required|int',
            'keterangan' => 'required'
        );
        $messages=array(
            'nomor_induk.required' => 'Nomor induk harus diisi',
            'nomor_induk.check_nomor_induk' => 'Nomor induk tidak ditemukan',
            'tanggal_cuti.required' => 'Tanggal cuti harus diisi',
            'lama_cuti.required' => 'Lama cuti harus diisi',
            'lama_cuti.int' => 'Lama cuti harus berupa angka',
            'keterangan.required' => 'Keterangan harus diisi'
        );
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["message"=>$messages], 500);
        }
        $karyawan = Cuti::create([
            'nomor_induk' => $request->nomor_induk,
            'tanggal_cuti' => $request->tanggal_cuti,
            'lama_cuti' => $request->lama_cuti,
            'keterangan' => $request->keterangan
        ]);
        return response()->json([
            'data' => new CutiResource($karyawan),
            'message' => 'Cuti berhasil ditambahkan'
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $rules=array(
            'nomor_induk' => 'required|check_nomor_induk',
            'tanggal_cuti' => 'required',
            'lama_cuti' => 'required|number',
            'keterangan' => 'required'
        );
        $messages=array(
            'nomor_induk.required' => 'Nomor induk harus diisi',
            'nomor_induk.check_nomor_induk' => 'Nomor induk tidak ditemukan',
            'tanggal_cuti.required' => 'Tanggal cuti harus diisi',
            'lama_cuti.required' => 'Lama cuti harus diisi',
            'lama_cuti.number' => 'Lama cuti harus berupa angka',
            'keterangan.required' => 'Keterangan harus diisi'
        );
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["message"=>$messages], 500);
        }
        $karyawan = Cuti::create([
            'nomor_induk' => $request->nomor_induk,
            'tanggal_cuti' => $request->tanggal_cuti,
            'lama_cuti' => $request->lama_cuti,
            'keterangan' => $request->keterangan
        ]);
        return response()->json([
            'data' => new CutiResource($karyawan),
            'message' => 'Cuti berhasil ditambahkan'
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
