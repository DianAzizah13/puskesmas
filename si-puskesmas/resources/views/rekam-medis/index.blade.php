<x-dashboard-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-xl">Daftar Rekam Medis</h1>

        <div class="justify-between flex mt-6">
            <form method="GET" action="{{route('rekam-medis.index')}}" class="flex gap-2">
                <x-text-input class="block w-96" type="text" name="query" placeholder="Cari Data (Nama/Diagnosa)..." />

                <select class="block w-full rounded-md border-gray-300 shadow-sm" name="sort" required>
                    <option value="ASC">Terlama</option>
                    <option value="DESC">Terbaru</option>
                </select>
            </form>
            <div class="flex gap-2">
                <x-bladewind::button href="{{route('rekam-medis.print', ['sort'=>$sort, 'query'=>$query])}}"
                    color="green" class="w-40 rounded-md text-center" size="small" tag="a">Cetak Data
                </x-bladewind::button>
            </div>
            <!-- <x-bladewind::button href="{{route('rekam-medis.create')}}" class="w-60 rounded-md text-center" size="small" tag="a">Tambah Kunjungan</x-bladewind::button> -->
        </div>

        <div class="border shadow-lg">
            <x-bladewind::table has_border="true" striped="true" celled="true">
                <x-slot name="header">
                    <th>No</th>
                    <th>Pasien</th>
                    <th>NIK</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Aksi</th>
                </x-slot>
                @foreach($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->kunjungan->pasien->nama_pasien}}</td>
                    <td>{{$d->kunjungan->pasien->nik}}</td>
                    <td>{{$d->keluhan}}</td>
                    <td>{{$d->diagnosa}}</td>
                    <td>{{$d->kunjungan->tanggal_kunjungan}}</td>
                    <td class="inline-flex items-center gap-2 w-full">
                        @if(!$d->diagnosa)
                        <x-bladewind::button tag="a" class="inline-flex items-center p-2 px-3 text-center rounded-md"
                            href="{{ route('rekam-medis.edit', $d->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2z" />
                            </svg>
                        </x-bladewind::button>
                        @endif
                        <x-bladewind::button tag="a" class="inline-flex items-center p-2 px-3 text-center rounded-md"
                            href="{{ route('rekam-medis.user-index', $d->kunjungan->pasien->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-earmark-medical-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0m-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1" />
                            </svg>
                        </x-bladewind::button>
                    </td>
                </tr>
                @endforeach
            </x-bladewind::table>
        </div>
    </section>
</x-dashboard-layout>