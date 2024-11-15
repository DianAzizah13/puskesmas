<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\RekamMedis;
use App\Models\Waktu;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $start = $request->query('start');
        $end = $request->query('end');

        $data = Kunjungan::orderBy('created_at', 'DESC')->get();

        if ($query || $start || $end) {
            $data = Kunjungan::when($start && $end, function ($query) use ($start, $end) {
                        return $query->whereBetween('tanggal_kunjungan', [$start, $end]);
                    })->when($query, function ($q) use ($query) {
                        return $q->whereHas('pasien', function ($q) use ($query) {
                            $q->where('nama_pasien', 'LIKE', "%{$query}%");
                        });
                    })->orderBy('created_at', 'DESC')->get();
        }

        return view('kunjungan.index', ['data' => $data, 'query'=>$query, 'start'=>$start, 'end'=>$end]);
    }

    public function print(Request $request)
    {
        $query = $request->query('query');
        $start = $request->query('start');
        $end = $request->query('end');
        $data = Kunjungan::orderBy('created_at', 'DESC')->get();

        if ($query || $start || $end) {
            $data = Kunjungan::when($start && $end, function ($query) use ($start, $end) {
                        return $query->whereBetween('tanggal_kunjungan', [$start, $end]);
                    })->when($query, function ($q) use ($query) {
                        return $q->whereHas('pasien', function ($q) use ($query) {
                            $q->where('nama_pasien', 'LIKE', "%{$query}%");
                        });
                    })->orderBy('created_at', 'DESC')->get();
        }

        $pdf = Pdf::loadView('pdf.kunjungan', ['data' => $data, 'title' => 'DATA KUNJUNGAN']);
        return $pdf->download('data_kunjungan.pdf');
    }

    public function poliKunjungan()
    {
        $poli = Poli::all();

        return view('kunjungan.select-poli', ['poli' => $poli]);
    }

    public function timeKunjungan(string $id)
    {
        $waktu = Waktu::all();

        $currentDate = Carbon::now()->locale('id');
        $startOfWeek = $currentDate->copy()->startOfWeek();
        $endOfWeek = $currentDate->endOfWeek(); // Get the end of the week (Sunday)

        $weekDates = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            if (!$date->isSunday()) {
                $weekDates[] = $date;
            }
        }

        return view('kunjungan.select-time', ['id_poli' => $id, 'waktu' => $waktu, 'tanggal' => $weekDates]);
    }

    public function searchNik(Request $request)
    {
        return view('kunjungan.search-nik', ['id_poli' => $request->query('id_poli'), 'id_waktu' => $request->query('id_waktu'), 'tanggal_kunjungan' => $request->query('tanggal_kunjungan')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pasien = Pasien::where('nik', $request->query('nik'))->first();

        if (!isset($pasien->id)) {

            return view('kunjungan.not-nik', ['id_poli' => Poli::find($request->query('id_poli')), 'id_waktu' => Waktu::find($request->query('id_waktu')), 'tanggal_kunjungan' => Carbon::parse($request->query('tanggal_kunjungan'))->locale('id')]);
        } else {
            return view('kunjungan.has-nik', ['pasien' => $pasien, 'id_poli' => Poli::find($request->query('id_poli')), 'id_waktu' => Waktu::find($request->query('id_waktu')), 'tanggal_kunjungan' => Carbon::parse($request->query('tanggal_kunjungan'))->locale('id')]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $poli = Poli::find($request->id_poli);
        $antri = count(Kunjungan::where('id_waktu', $request->id_waktu)->where('tanggal_kunjungan', $request->tanggal_kunjungan)->where('id_poli', $poli->id)->get());
        $no_antri = 0;
        switch ($request->id_waktu) {
            case 1: {
                    $no_antri = $poli->kode_poli . '-' . 0 + $antri + 1;
                    break;
                }
            case 2: {
                    $no_antri = $poli->kode_poli . '-' . 20 + $antri + 1;
                    break;
                }
            case 3: {
                    $no_antri = $poli->kode_poli . '-' . 40 + $antri + 1;
                    break;
                }
            case 4: {
                    $no_antri = $poli->kode_poli . '-' . 60 + $antri + 1;
                    break;
                }
            case 5: {
                    $no_antri = $poli->kode_poli . '-' . 80 + $antri + 1;
                    break;
                }
            case 6: {
                    $no_antri = $poli->kode_poli . '-' . 100 + $antri + 1;
                    break;
                }
            case 7: {
                    $no_antri = $poli->kode_poli . '-' . 120 + $antri + 1;
                    break;
                }
        }


        if ($request->exist == "0") {
            $pasien = Pasien::create([
                'nik' => $request->nik,
                'nama_pasien' => $request->nama_pasien,
                'penjamin' => $request->penjamin,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'tanggal_lahir' => $request->tanggal_lahir,
                'bpjs' => $request->bpjs
            ]);

            $poli = Poli::find($request->id_poli)->kode_poli;

            $kunjungan = Kunjungan::create([
                'id_pasien' => $pasien->id,
                'id_poli' => $request->id_poli,
                'id_waktu' => $request->id_waktu,
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'kode_kunjungan' => '-',
                'status' => 'Aktif'
            ]);

            $kunjungan->kode_kunjungan = $no_antri;
            $kunjungan->save();


            Alert::success('Berhasil', 'Nomor Antrian : ' . $no_antri);
            return redirect()->route('landing.home');
        } else {

            $kunjungan = Kunjungan::create([
                'id_pasien' => $request->id_pasien,
                'id_poli' => $request->id_poli,
                'id_waktu' => $request->id_waktu,
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'kode_kunjungan' => '-',
                'status' => 'Aktif'
            ]);

            $poli = Poli::find($request->id_poli)->kode_poli;

            $kunjungan->kode_kunjungan = $no_antri;
            $kunjungan->save();


            Alert::success('Berhasil', 'Nomor Antrian : ' . $no_antri);
            return redirect()->route('landing.home');
        }
    }

    public function getTimeOptions(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $poli = $request->input('poli');
        $timeOptions = $this->getTimeOptionsFromDatabase($tanggal, $poli);
        return response()->json(['timeOptions' => $timeOptions]);
    }

    private function getTimeOptionsFromDatabase($tanggal, $poli)
    {
        $existing = Kunjungan::where('tanggal_kunjungan', $tanggal)->where('id_poli', $poli)->get('id_waktu');

        return $existing;
    }

    /**
     * Display the specified resource.
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    public function cekAntri(Request $request)
    {
        $no = $request->query('antri');

        $kode = substr($no, 0, 1);

        $poli = Poli::where('kode_poli', $kode)->first();

        $exist = Kunjungan::where('kode_kunjungan', $no)->whereDate('tanggal_kunjungan', Carbon::now())->where('id_poli', $poli->id)->where('status', 'Aktif')->first();

        if (!$exist) {
            Alert::error('Gagal', 'Nomor Antrian Tidak Ditemukan');
            return redirect()->back();
        }

        $antri = Kunjungan::whereDate('tanggal_kunjungan', Carbon::now())->where('id_poli', $poli->id)->orderBy('kode_kunjungan', 'ASC')->where('status', 'Aktif')->get('kode_kunjungan');

        if ($antri->pluck('kode_kunjungan')->search($no) != 0) {

            Alert::info('Nomor Antrian', 'Jumlah Antrian Sebelum Anda : ' . $antri->pluck('kode_kunjungan')->search($no) . ' Pasien');
            return redirect()->back();
        } else {
            Alert::info('Nomor Antrian', 'Sekarang Adalah Antrian Anda.');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        $dokter = Dokter::where('id_poli', $kunjungan->id_poli)->get();

        return view('kunjungan.edit', ['dokter' => $dokter, 'kunjungan' => $kunjungan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        RekamMedis::create([
            'id_kunjungan' => $kunjungan->id,
            'id_dokter' => $request->id_dokter,
            'keluhan' => $request->keluhan
        ]);

        Alert::success('Berhasil', 'Berhasil Memproses Kunjungan!');
        return redirect()->route('kunjungan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        //
    }
}