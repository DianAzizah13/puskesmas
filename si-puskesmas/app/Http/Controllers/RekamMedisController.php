<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $sort = $request->query('sort');

        if (auth()->user()->role == 'dokter') {
            $data = RekamMedis::where('id_dokter', Dokter::where('id_user', auth()->user()->id)->first()->id)->orderBy('id', 'DESC')->get();

            if ($query || $sort) {
                
                $data = RekamMedis::where('id_dokter', Dokter::where('id_user', auth()->user()->id)->first()->id)
                    ->whereHas('kunjungan.pasien', function ($q) use ($query) {
                        $q->where('nama_pasien', 'LIKE', "%{$query}%");
                    })->orWhere('diagnosa','LIKE',"%{$query}%")->orderBy('id', $sort)->get();
            }
        } else {
            $data = RekamMedis::orderBy('id', 'DESC')->get();

            if ($query || $sort) {
                $data = RekamMedis::whereHas('kunjungan.pasien', function ($q) use ($query) {
                        $q->where('nama_pasien', 'LIKE', "%{$query}%");
                    })->orWhere('diagnosa','LIKE',"%{$query}%")->orderBy('id', $sort)->get();
            }
        }

        return view('rekam-medis.index', ['data' => $data, 'query'=>$query, 'sort'=>$sort]);
    }

    public function print(Request $request)
    {
        $query = $request->query('query');
        $sort = $request->query('sort');

        $data = RekamMedis::orderBy('id', 'DESC')->get();

        if ($query || $sort) {
            $data = RekamMedis::whereHas('kunjungan.pasien', function ($q) use ($query) {
                    $q->where('nama_pasien', 'LIKE', "%{$query}%");
                })->orWhere('diagnosa','LIKE',"%{$query}%")->orderBy('id', $sort)->get();
        }

        $pdf = Pdf::loadView('pdf.rekam-medis', ['data' => $data, 'title' => 'DATA REKAM MEDIS']);
        return $pdf->download('data_rekam_medis.pdf');
    }

    public function userIndex(string $id)
    {
        $data = RekamMedis::whereHas('kunjungan', function ($query) use ($id) {
            $query->where('id_pasien', $id);
        })->get();

        $pasien = Pasien::find($id);

        return view('rekam-medis.user-index', ['data' => $data, 'pasien' => $pasien]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekamMedi)
    {
        return view('rekam-medis.edit', ['medis' => $rekamMedi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedi)
    {
        $rekamMedi->update($request->all());

        $kunjungan = Kunjungan::find($rekamMedi->id_kunjungan);
        $kunjungan->status = 'Selesai';
        $kunjungan->save();

        ResepObat::create([
            'id_rekam_medis' => $rekamMedi->id,
            'resep_obat' => $request->resep_obat,
            'status' => 'Sedang Disiapkan'
        ]);

        Alert::success('Berhasil', 'Berhasil Memberikan Diagnosa!');
        return redirect()->route('rekam-medis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
