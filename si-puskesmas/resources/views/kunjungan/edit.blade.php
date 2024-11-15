<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Kunjungan</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Proses Kunjungan</p>
        </div>

        <div class="flex gap-8">
            <form action="{{route('kunjungan.update', $kunjungan->id)}}" class="w-80 flex flex-col gap-6 p-4 border-2" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label :value="__('Keluhan')" />
                    <textarea class="block mt-1 w-full rounded-md border-gray-400 shadow" name="keluhan" required></textarea>
                </div>
                <div>
                    <x-input-label :value="__('Pilih Dokter')" />
                    <select class="block mt-1 w-full border rounded-md border-gray-400 shadow" name="id_dokter" required>
                        @foreach($dokter as $p)
                        <option value="{{$p->id}}">{{$p->user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-bladewind::button can_submit="true" class="w-full rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
                </div>
            </form>

            <div class="w-80 flex flex-col gap-6 border-2 p-4">
                <div>
                    <x-input-label :value="__('Nama Pasien')" />
                    <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$kunjungan->pasien->nama_pasien}}" name="name" disabled />
                </div>
                <div>
                    <x-input-label :value="__('Poli')" />
                    <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$kunjungan->poli->nama_poli}}" name="name" disabled />
                </div>
                <div>
                    <x-input-label :value="__('Tanggal dan Waktu')" />
                    <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$kunjungan->tanggal_kunjungan.', '.$kunjungan->waktu->jam}}" name="name" disabled />
                </div>
                <div>
                    <x-input-label :value="__('Kode Kunjungan')" />
                    <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$kunjungan->kode_kunjungan}}" name="name" disabled />
                </div>
            </div>
        </div>


    </section>
</x-dashboard-layout>