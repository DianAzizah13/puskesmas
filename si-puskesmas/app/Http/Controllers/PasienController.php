<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $data = Pasien::all();

        if($query){
            $data = Pasien::where('nama_pasien','LIKE',"%{$query}%")->orWhere('nik','LIKE',"%{$query}%")->get();
        }

        return view('pasien.index', ['data'=>$data, 'query'=>$query]);
    }

    public function print(Request $request)
    {
        $query = $request->query('query');
        $data = Pasien::all();

        if($query){
            $data = Pasien::where('nama_pasien','LIKE',"%{$query}%")->orWhere('nik','LIKE',"%{$query}%")->get();
        }

        $pdf = Pdf::loadView('pdf.pasien', ['data'=>$data, 'title'=>'DATA PASIEN']);
        return $pdf->download('data_pasien.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pasien::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambah Pasien!');
        return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', ['pasien'=>$pasien]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $pasien->update($request->all());

        Alert::success('Berhasil', 'Berhasil Mengubah Pasien!');
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Pasien!');
        return redirect()->route('pasien.index');
    }
}
