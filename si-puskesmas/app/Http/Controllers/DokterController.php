<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');
        $data = Dokter::all();

        if($query){
            $data = Dokter::whereHas('user', function($q) use ($query){
                $q->where('name','LIKE',"%{$query}%");
            })->get();
            if(!count($data)){
                $data = Dokter::where('nip','LIKE',"%{$query}%")->get();
            }
        }


        return view('dokter.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poli = Poli::all();

        return view('dokter.create', ['poli'=>$poli]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'dokter'
        ]);

        Dokter::create([
            'id_user'=>$user->id,
            'id_poli'=>$request->id_poli,
            'nip'=>$request->nip,
            'telepon'=>$request->telepon
        ]);

        Alert::success('Berhasil', 'Berhasil Menambah Dokter!');

        return redirect()->route('dokter.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        $poli = Poli::all();

        return view('dokter.edit', ['dokter'=>$dokter, 'poli'=>$poli]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        $dokter->update($request->all());

        $user = User::find($dokter->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        User::find($dokter->id_user)->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Dokter!');
        return redirect()->route('dokter.index');
    }
}
