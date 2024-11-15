<?php

use App\Http\Controllers\DetailResepController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\UserController;
use App\Models\Kunjungan;
use App\Models\Poli;
use App\Models\ResepObat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaController;

Route::get('/', function () {

    $poli = Poli::all();

    $tgl = Carbon::now()->format('Y-m-d');
    $antri = [];


    foreach($poli as $p){
        $antrian = Kunjungan::where('id_poli', $p->id)->where('tanggal_kunjungan', $tgl)->where('status', 'Aktif')->first();

        if($antrian){
            $antri[$p->nama_poli] = $antrian->kode_kunjungan;
        }else{
            $antri[$p->nama_poli] = 'Belum Ada';
        }

    }

    $apotek = ResepObat::whereHas('rekamMedis.kunjungan', function($query) use ($tgl){
        $query->where('tanggal_kunjungan', $tgl);
    })->where('status', '!=', 'Selesai')->first();

    return view('landing.home', ['antri'=>$antri, 'apotek'=>$apotek]);
})->name('landing.home');

Route::get('createcaptcha', [CaptchaController::class, 'create'])->name("captchacontroller.create");
Route::post('createcaptcha', [CaptchaController::class, 'captchaValidate'])->name("captchacontroller.captcha");
Route::get('refreshcaptcha', [CaptchaController::class, 'refreshCaptcha'])->name("captchacontroller.refresh");

Route::get('/profil', function () {
    return view('landing.profile');
})->name('landing.profile');

Route::get('/kontak', function () {
    return view('landing.contact');
})->name('landing.contact');

Route::get('/informasi', function () {
    return view('landing.informasi');
})->name('landing.informasi');

Route::get('/dashboard', function () {

    $today = Carbon::now();
    $antrian = Kunjungan::whereDate('tanggal_kunjungan', $today)->where('status', 'Aktif')->get();
    $pasien = Kunjungan::whereDate('tanggal_kunjungan', $today)->where('status', 'Selesai')->get();
    $kunjungan = Kunjungan::whereDate('tanggal_kunjungan', $today)->get();

    return view('dashboard', ['antrian'=>count($antrian), 'pasien'=>count($pasien), 'kunjungan'=>count($kunjungan)]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('kunjungan/poli', [KunjunganController::class, 'poliKunjungan'])->name('kunjungan.select-poli');
Route::get('kunjungan/time/{id}', [KunjunganController::class, 'timeKunjungan'])->name('kunjungan.select-time');
Route::get('kunjungan/search-nik', [KunjunganController::class, 'searchNik'])->name('kunjungan.search-nik');
Route::get('/get-time-options', [KunjunganController::class, 'getTimeOptions'])->name('get.time.options');

Route::resource('inbox', InboxController::class);
Route::resource('kunjungan', KunjunganController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('user', UserController::class);
    Route::resource('poli', PoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('obat', ObatController::class);
    Route::get('/obat-print', [ObatController::class, 'print'])->name('obat.print');

    Route::resource('resep', ResepObatController::class);
    Route::get('/resep-print', [ResepObatController::class, 'print'])->name('resep.print');
    Route::get('/resep-cek', [ResepObatController::class, 'cekResep'])->name('resep.cek');

    Route::resource('pasien', PasienController::class);
    Route::get('/pasien-print', [PasienController::class, 'print'])->name('pasien.print');

    Route::get('/kunjungan-print', [KunjunganController::class, 'print'])->name('kunjungan.print');
    Route::get('/kunjungan-cek', [KunjunganController::class, 'cekAntri'])->name('kunjungan.cek');

    Route::resource('detail-resep', DetailResepController::class);
    Route::resource('rekam-medis', RekamMedisController::class)->parameters(['rekam_medis' => 'rekam_medis']);
    Route::get('/rekam-medis/user/{id}', [RekamMedisController::class, 'userIndex'])->name('rekam-medis.user-index');
    Route::get('/rekam-medis-print', [RekamMedisController::class, 'print'])->name('rekam-medis.print');

    Route::get('/resep-finish/{id}', [ResepObatController::class, 'finish'])->name('resep.finish');

});


require __DIR__.'/auth.php';