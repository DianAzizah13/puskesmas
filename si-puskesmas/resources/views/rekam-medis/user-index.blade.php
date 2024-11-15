<x-dashboard-layout>
    <section class="flex flex-col gap-4">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Rekam Medis</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Rekam Medis Pasien</p>
        </div>

        <div class="p-4 border-2">
            <h1 class="text-2xl font-bold mb-4">Informasi Pasien</h1>

            <div class="flex gap-8">

                <table>
                    <tbody>
                        <tr>
                            <td class="font-bold">ID Pasien</td>
                            <td class="p-1">:</td>
                            <td>{{$pasien->id}}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Nama</td>
                            <td class="p-1">:</td>
                            <td>{{$pasien->nama_pasien}}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Jenis Kelamin</td>
                            <td class="p-1">:</td>
                            <td>{{$pasien->jenis_kelamin}}</td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="font-bold">Tanggal Lahir</td>
                            <td class="p-1">:</td>
                            <td>{{$pasien->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">No. Telepon</td>
                            <td class="p-1">:</td>
                            <td>{{$pasien->telepon}}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Alamat</td>
                            <td class="p-1">:</td>
                            <td>{{$pasien->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="border shadow-lg">
            <x-bladewind::table has_border="true" striped="true" celled="true">
                <x-slot name="header">
                    <th>No</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Diagnosa</th>
                    <th>Anamnesa</th>
                    <th>Keterangan</th>
                    <th>Resep Obat</th>
                </x-slot>
                @foreach($data as $d)
                @if($d->diagnosa)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->kunjungan->tanggal_kunjungan}}</td>
                    <td>{{$d->diagnosa}}</td>
                    <td>{{$d->anamnesa}}</td>
                    <td>{{$d->keterangan}}</td>
                    <td>{{$d->resep_obat}}</td>
                </tr>
                @endif
                @endforeach
            </x-bladewind::table>
        </div>
    </section>
</x-dashboard-layout>