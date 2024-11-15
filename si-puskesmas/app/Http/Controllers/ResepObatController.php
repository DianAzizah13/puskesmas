<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ResepObat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $sort = $request->query('sort');
        $data = ResepObat::orderBy('id', 'DESC')->get();

        if ($query || $sort) {
            $data = ResepObat::whereHas('rekamMedis.kunjungan.pasien', function ($q) use ($query) {
                    $q->where('nama_pasien', 'LIKE', "%{$query}%");
                })->orWhere('resep_obat','LIKE',"%{$query}%")->orderBy('id', $sort)->get();
        }

        return view('resep.index', ['data'=>$data, 'query'=>$query, 'sort'=>$sort]);
    }

    public function print(Request $request)
    {
        $query = $request->query('query');
        $sort = $request->query('sort');
        $data = ResepObat::orderBy('id', 'DESC')->get();

        if ($query || $sort) {
            $data = ResepObat::whereHas('rekamMedis.kunjungan.pasien', function ($q) use ($query) {
                    $q->where('nama_pasien', 'LIKE', "%{$query}%");
                })->orWhere('resep_obat','LIKE',"%{$query}%")->orderBy('id', $sort)->get();
        }

        $pdf = Pdf::loadView('pdf.resep', ['data'=>$data, 'title'=>'DATA RESEP']);
        return $pdf->download('data_resep.pdf');
    }

    public function cekResep(Request $request)
    {
        $no = $request->query('antri');

        $exist = ResepObat::whereHas('rekamMedis.kunjungan', function($query) use($no){
            $query->whereDate('tanggal_kunjungan', Carbon::now())->where('kode_kunjungan', $no);
        })->first();

        if(!$exist){
            Alert::error('Gagal', 'Resep Tidak Ditemukan');
            return redirect()->back();
        }
        Alert::info('Cek Resep', 'Status Resep : '.$exist->status);
        return redirect()->back();
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
    public function show(ResepObat $resepObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resepObat = ResepObat::find($id);
        $obat = Obat::all();

        return view('resep.edit', ['resep' => $resepObat, 'obat'=>$obat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resepObat = ResepObat::find($id);
        $resepObat->status = 'Telah Selesai';
        $resepObat->save();

        Alert::success('Berhasil', 'Berhasil Menyiapkan Obat!');
        return redirect()->route('resep.index');
    }

    public function finish(string $id)
    {
        $resepObat = ResepObat::find($id);
        $resepObat->status = 'Selesai';
        $resepObat->save();

        Alert::success('Berhasil', 'Berhasil Menyelesaikan Resep!');
        return redirect()->route('resep.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResepObat $resepObat)
    {
        //
    }
}
