<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use App\Models\Waktu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'=>'Dokter Gigi',
            'email'=>'doktergigi@mail.com',
            'password'=>Hash::make('dokter123'),
            'role'=>'dokter'
        ]);

        User::create([
            'name'=>'Dokter KIA',
            'email'=>'dokterkia@mail.com',
            'password'=>Hash::make('dokter123'),
            'role'=>'dokter'
        ]);

        User::create([
            'name'=>'Dokter Umum',
            'email'=>'dokterumum@mail.com',
            'password'=>Hash::make('dokter123'),
            'role'=>'dokter'
        ]);

        User::create([
            'name'=>'Dokter Lansia',
            'email'=>'dokterlansia@mail.com',
            'password'=>Hash::make('dokter123'),
            'role'=>'dokter'
        ]);

        User::create([
            'name'=>'Admin',
            'email'=>'admin@mail.com',
            'password'=>Hash::make('admin123'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'Apoteker',
            'email'=>'apoteker@mail.com',
            'password'=>Hash::make('apoteker123'),
            'role'=>'apoteker'
        ]);

        Poli::create([
            'nama_poli'=>'Poli Umum',
            'kode_poli'=>'A'
        ]);

        Poli::create([
            'nama_poli'=>'Poli Lansia',
            'kode_poli'=>'B'
        ]);

        Poli::create([
            'nama_poli'=>'Poli KIA',
            'kode_poli'=>'C'
        ]);

        Poli::create([
            'nama_poli'=>'Poli Gigi',
            'kode_poli'=>'G'
        ]);

        Dokter::create([
            'id_user'=>3,
            'id_poli'=>1,
            'nip'=>'432154654567',
            'telepon'=>'081234567890'
        ]);

        Dokter::create([
            'id_user'=>4,
            'id_poli'=>2,
            'nip'=>'432154654567',
            'telepon'=>'081234567890'
        ]);
        
        Dokter::create([
            'id_user'=>2,
            'id_poli'=>3,
            'nip'=>'432154654567',
            'telepon'=>'081234567890'
        ]);
        
        Dokter::create([
            'id_user'=>1,
            'id_poli'=>4,
            'nip'=>'432154654567',
            'telepon'=>'081234567890'
        ]);

        Waktu::create([
            'jam'=>'08.00'
        ]);
        
        Waktu::create([
            'jam'=>'09.00'
        ]);

        Waktu::create([
            'jam'=>'10.00'
        ]);
        
        Waktu::create([
            'jam'=>'11.00'
        ]);
        
        Waktu::create([
            'jam'=>'12.00'
        ]);
        
        Waktu::create([
            'jam'=>'13.00'
        ]);
        
        Waktu::create([
            'jam'=>'14.00'
        ]);
    }
}
