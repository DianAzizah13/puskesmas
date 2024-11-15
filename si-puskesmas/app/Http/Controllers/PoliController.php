<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $data = Poli::all();

        if($query){
            $data = Poli::where('nama_poli','LIKE',"%{$query}%")->get();
        }

        return view('poli.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Poli::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambah Poli!');
        return redirect()->route('poli.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poli $poli)
    {
        return view('poli.edit', ['poli'=>$poli]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poli $poli)
    {
        $poli->update($request->all());

        Alert::success('Berhasil', 'Berhasil Mengubah Poli!');
        return redirect()->route('poli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poli $poli)
    {
        $poli->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Poli!');
        return redirect()->route('poli.index');
    }
}
