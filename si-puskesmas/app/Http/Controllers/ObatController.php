<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Raw;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $sort = $request->query('sort');
        $data = Obat::all();

        if($query || $sort){
            $data = Obat::where('nama_obat','LIKE',"%{$query}%")->orderBy('kadaluwarsa', $sort)->get();
        }

        return view('obat.index', ['data'=>$data, 'query'=>$query, 'sort'=>$sort]);
    }

    public function print(Request $request)
    {
        $query = $request->query('query');
        $sort = $request->query('sort');
        $data = Obat::all();

        if($query || $sort){
            $data = Obat::where('nama_obat','LIKE',"%{$query}%")->orderBy('kadaluwarsa', $sort)->get();
        }

        $pdf = Pdf::loadView('pdf.obat', ['data'=>$data, 'title'=>'DATA OBAT']);
        return $pdf->download('data_obat.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Obat::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambah Obat!');
        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('obat.edit', ['obat'=>$obat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->update($request->all());

        Alert::success('Berhasil', 'Berhasil Mengubah Obat!');
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Obat!');
        return redirect()->route('obat.index');
    }
}