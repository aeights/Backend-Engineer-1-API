<?php

namespace App\Http\Controllers;

use App\Http\Resources\KaryawanResource;
use App\Http\Resources\KaryawanResourceCollection;
use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return new KaryawanResourceCollection($karyawan);
    }

    public function store(Request $request)
    {
        $rules=array(
            'nomor_induk' => 'required|unique:karyawan',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_bergabung' => 'required'
        );
        $messages=array(
            'nomor_induk.required' => 'Nomor induk harus diisi',
            'nomor_induk.unique' => 'Nomor induk sudah ada',
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_bergabung.required' => 'Tanggal bergabung harus diisi'
        );
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["message"=>$messages], 500);
        }
        $karyawan = Karyawan::create([
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_bergabung' => $request->tanggal_bergabung
        ]);
        return response()->json([
            'data' => new KaryawanResource($karyawan),
            'message' => 'Karyawan berhasil ditambahkan'
        ]);
    }

    public function show(string $nomor_induk)
    {
        $karyawan = Karyawan::where('nomor_induk',$nomor_induk)->first();
        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }
        return new KaryawanResource($karyawan);
    }

    public function update(Request $request, string $nomor_induk)
    {
        $karyawan = Karyawan::where('nomor_induk',$nomor_induk)->first();
        $rules=array(
            'nomor_induk' => ['required', 'unique:karyawan,nomor_induk,'.$karyawan->id],
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_bergabung' => 'required'
        );
        $messages=array(
            'nomor_induk.required' => 'Nomor induk harus diisi',
            'nomor_induk.unique' => 'Nomor induk sudah ada',
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_bergabung.required' => 'Tanggal bergabung harus diisi'
        );
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["message"=>$messages], 500);
        }
        
        $karyawan_update = Karyawan::find($karyawan->id);
        $karyawan_update->nomor_induk=$request->nomor_induk;
        $karyawan_update->nama=$request->nama;
        $karyawan_update->alamat=$request->alamat;
        $karyawan_update->tanggal_lahir=$request->tanggal_lahir;
        $karyawan_update->tanggal_bergabung=$request->tanggal_bergabung;
        $karyawan_update->save();

        return response()->json([
            'data' => new KaryawanResource($karyawan_update),
            'message' => 'Karyawan berhasil diupdate'
        ]);
    }

    public function destroy(string $nomor_induk)
    {
        $karyawan = Karyawan::where('nomor_induk',$nomor_induk)->delete();
        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }

        return response()->json(['message' => 'Karyawan berhasil dihapus']);
    }

    public function karyawanTerlama()
    {
        $karyawan = Karyawan::orderBy('tanggal_bergabung')->take(3)->get();
        return new KaryawanResourceCollection($karyawan);
    }

    public function pernahCuti()
    {
        $cuti = Cuti::select('nomor_induk')->distinct()->get();
        $karyawan = Karyawan::whereIn('nomor_induk',$cuti)->get();
        return new KaryawanResourceCollection($karyawan);
    }

    public function sisaCuti()
    {
        $data = Karyawan::with('cuti')->get();
        $cuti = [];
        foreach ($data as $value) {
            $cuti[] = [
                'nomor_induk' => $value->nomor_induk,
                'nama' => $value->nama,
                'sisa_cuti' => 12-$value->cuti->sum('lama_cuti'),
            ];
        }
        
        return response()->json([
            'data' => $cuti
        ]);
    }
}
