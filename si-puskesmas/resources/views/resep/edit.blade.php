<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Resep</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Proses Resep</p>
        </div>

        <div class="flex gap-8">
            <div class="w-80 flex flex-col gap-4">
                <div class="flex flex-col gap-6 border-2 p-4">
                    <div>
                        <x-input-label :value="__('Nama Pasien')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$resep->rekamMedis->kunjungan->pasien->nama_pasien}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Nama Dokter')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$resep->rekamMedis->kunjungan->poli->nama_poli}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Tanggal dan Waktu')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$resep->rekamMedis->kunjungan->tanggal_kunjungan.', '.$resep->rekamMedis->kunjungan->waktu->jam}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Kode Kunjungan')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$resep->rekamMedis->kunjungan->kode_kunjungan}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Status')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$resep->status}}" name="name" disabled />
                    </div>
                </div>
                <div class="flex flex-col gap-6 border-2 p-4">
                    <div>
                        <x-input-label :value="__('Resep Obat')" />
                        <textarea class="block mt-1 w-full rounded-md border-gray-200 bg-gray-200 shadow" disabled>{{$resep->resep_obat}}</textarea>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 p-4 border-2">
                <form action="{{route('detail-resep.store')}}" class="flex gap-2" method="POST">
                    @csrf

                    <input name="id_resep" value="{{$resep->id}}" type="hidden" />

                    <div>
                        <x-input-label :value="__('Nama Obat')" />
                        <select class="block mt-1 w-60 rounded-md border-gray-300 shadow-sm" name="id_obat" required>
                            @foreach($obat as $o)
                            <option value="{{$o->id}}">{{$o->nama_obat}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label :value="__('Jumlah')" />
                        <x-text-input class="w-28 block mt-1 w-full" type="number" name="jumlah" required />
                    </div>

                    <div>
                        <x-input-label :value="__('Keterangan')" />
                        <x-text-input class="w-60 block mt-1 w-full" type="text" name="keterangan" required />
                    </div>

                    <div>
                        <x-bladewind::button can_submit="true" color="green" class="w-full rounded-md text-center mt-6" size="small">Tambah</x-bladewind::button>
                    </div>
                </form>
                <div class="border">

                    <x-bladewind::table has_border="true" striped="true" celled="true">
                        <x-slot name="header">
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </x-slot>
                        @foreach($resep->detailResep as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->obat->nama_obat}}</td>
                            <td>{{$d->jumlah}} {{$d->obat->satuan}}</td>
                            <td>{{$d->keterangan}}</td>
                            <td class="inline-flex items-center gap-2 w-full">
                                <form action="{{ route('detail-resep.destroy', $d->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-bladewind::button can_submit="true" color="red" class="inline-flex items-center p-2 px-3 text-center rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                        </svg>
                                    </x-bladewind::button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </x-bladewind::table>

                </div>
                <form action="{{route('resep.update', $resep->id)}}" class="flex gap-2 justify-end" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="Telah Selesai"/>
                    <div>
                        <x-bladewind::button can_submit="true" class="w-full rounded-md text-center mt-2" size="small">Simpan</x-bladewind::button>
                    </div>
                </form>
            </div>



        </div>


    </section>
</x-dashboard-layout>