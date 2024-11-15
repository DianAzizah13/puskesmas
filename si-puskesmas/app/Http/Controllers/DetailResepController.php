<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        DetailResep::create($request->all());

        $obat = Obat::find($request->id_obat);
        $obat->stok = $obat->stok - $request->jumlah;
        $obat->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailResep $detailResep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailResep $detailResep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailResep $detailResep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailResep $detailResep)
    {
        $obat = Obat::find($detailResep->id_obat);
        $obat->stok = $obat->stok + $detailResep->jumlah;
        $obat->save();

        $detailResep->delete();

        return redirect()->back();
    }
}
