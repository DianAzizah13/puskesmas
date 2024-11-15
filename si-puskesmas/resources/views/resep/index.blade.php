<x-dashboard-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-xl">Daftar Resep</h1>

        <div class="justify-between flex mt-6">
            <form method="GET" action="{{route('resep.index')}}" class="gap-2 flex">
                <x-text-input class="block w-96" type="text" name="query" placeholder="Cari Data (Nama/Resep)..." />
                <select class="block w-full rounded-md border-gray-300 shadow-sm" name="sort" required>
                    <option value="ASC">Terlama</option>
                    <option value="DESC">Terbaru</option>
                </select>
            </form>
            <div class="flex gap-2">
                <x-bladewind::button href="{{route('resep.print', ['sort'=>$sort, 'query'=>$query])}}" color="green" class="w-40 rounded-md text-center" size="small" tag="a">Cetak Data</x-bladewind::button>
            </div>
            <!-- <x-bladewind::button href="{{route('rekam-medis.create')}}" class="w-60 rounded-md text-center" size="small" tag="a">Tambah Kunjungan</x-bladewind::button> -->
        </div>

        <div class="border shadow-lg">
            <x-bladewind::table has_border="true" striped="true" celled="true">
                <x-slot name="header">
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Resep</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </x-slot>
                @foreach($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->rekamMedis->kunjungan->pasien->nama_pasien}}</td>
                    <td>{{$d->rekamMedis->dokter->user->name}}</td>
                    <td>{{$d->resep_obat}}</td>
                    <td>{{$d->rekamMedis->kunjungan->tanggal_kunjungan}}</td>
                    <td>{{$d->status}}</td>
                    <td class="inline-flex items-center gap-2 w-full">
                        @if($d->status == 'Sedang Disiapkan')
                        <x-bladewind::button tag="a" class="inline-flex items-center p-2 px-3 text-center rounded-md" href="{{ route('resep.edit', $d->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2z" />
                            </svg>
                        </x-bladewind::button>
                        @elseif($d->status == 'Telah Selesai')
                        <x-bladewind::button tag="a" class="inline-flex items-center p-2 px-3 text-center rounded-md" href="{{ route('resep.finish', $d->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
                                <path fill="currentColor" d="m173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69L432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001" />
                            </svg>
                        </x-bladewind::button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </x-bladewind::table>
        </div>
    </section>
</x-dashboard-layout>