<x-landing-layout>
    <section class="register1">
        <h3>Pendaftaran</h3>

        <form id="register-form" method="POST" action="{{route('kunjungan.store')}}">
            @csrf

            <input name="tanggal_kunjungan" value="{{$tanggal_kunjungan}}" type="hidden">
            <input name="id_waktu" value="{{$id_waktu->id}}" type="hidden">
            <input name="id_poli" value="{{$id_poli->id}}" type="hidden">
            <input name="exist" value="0" type="hidden">
            <table>
                <tr>
                    <td>Tanggal Layanan</td>
                    <td>{{$tanggal_kunjungan->dayName}}, {{$tanggal_kunjungan->translatedFormat('d F Y')}}</td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>{{$id_waktu->jam}}</td>
                </tr>
                <tr>
                    <td>Poli/Klinik</td>
                    <td>{{$id_poli->nama_poli}}</td>
                </tr>
                <tr>
                    <td>Penjamin</td>
                    <td class="option-container">
                        <div>
                            <input id="umum" type="radio" class="peer hidden" value="Umum/Asuransi Lain" name="penjamin"/>
                            <label for="umum" class="py-2 peer-checked:bg-sky-200 bg-sky-100 cursor-pointer p-4 rounded">Umum/Asuransi Lain</label>
                        </div>
                        <div>
                            <input id="bpjs" type="radio" class="peer hidden" value="BPJS" name="penjamin"/>
                            <label for="bpjs" class="py-2 peer-checked:bg-sky-200 bg-sky-100 cursor-pointer p-4 rounded">BPJS Kesehatan</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td><input type="text" name="nik" id="nik" maxlength="16" required /></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama_pasien" id="nama" required /></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td class="option-container">
                        <div>
                            <input id="laki" type="radio" class="peer hidden" value="Laki-Laki" name="jenis_kelamin"/>
                            <label for="laki" class="py-2 peer-checked:bg-sky-200 bg-sky-100 cursor-pointer p-4 rounded">Laki-Laki</label>
                        </div>
                        <div>
                            <input id="perempuan" type="radio" class="peer hidden" value="Perempuan" name="jenis_kelamin"/>
                            <label for="perempuan" class="py-2 peer-checked:bg-sky-200 bg-sky-100 cursor-pointer p-4 rounded">Perempuan</label>
                        </div>
                    </td>
                </tr>
                <td>Tanggal Lahir</td>
                <td>
                    <input type="date" name="tanggal_lahir" id="tl" required />
                </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" id="alamat" required /></td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td><input type="text" name="telepon" id="telp" required /></td>
                </tr>
                <tr>
                    <td>No. BPJS</td>
                    <td><input type="text" name="bpjs" id="nobpjs" /></td>
                </tr>
            </table>
        </form>

        <div class="button-container">
            <a class="p-4 text-white bg-red-400 rounded-md py-2 -ml-6" href="{{ url()->previous() }}">Kembali</a>
            <button id="button-next" type="sumbit" form="register-form">
                Daftar
            </button>
        </div>
    </section>
</x-landing-layout>