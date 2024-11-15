<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Rekam Medis</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Proses Rekam Medis</p>
        </div>

        <div class="flex gap-8">
            <div class="w-80 flex flex-col gap-4">
                <div class="flex flex-col gap-6 border-2 p-4">

                    <div>
                        <x-input-label :value="__('Nama Pasien')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$medis->kunjungan->pasien->nama_pasien}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Nama Dokter')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$medis->kunjungan->poli->nama_poli}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Tanggal dan Waktu')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$medis->kunjungan->tanggal_kunjungan.', '.$medis->kunjungan->waktu->jam}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Kode Kunjungan')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$medis->kunjungan->kode_kunjungan}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Status')" />
                        <x-text-input class="block mt-1 bg-gray-200 w-full" type="text" value="{{$medis->kunjungan->status}}" name="name" disabled />
                    </div>
                    <div>
                        <x-input-label :value="__('Rekam Medis Pasien')" />
                        <x-bladewind::button href="{{route('rekam-medis.user-index', $medis->kunjungan->id_pasien)}}" tag="a" class="w-full rounded-md text-center mt-2" color="green" size="small">Lihat</x-bladewind::button>
                    </div>
                </div>
                <div class="flex flex-col gap-6 border-2 p-4">
                    <div>
                        <x-input-label :value="__('Keluhan')" />
                        <textarea class="block mt-1 w-full rounded-md border-gray-200 bg-gray-200 shadow" disabled>{{$medis->keluhan}}</textarea>
                    </div>
                </div>
            </div>
            <form action="{{route('rekam-medis.update', $medis->id)}}" class="w-80 flex flex-col gap-6 p-4 border-2" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label :value="__('Tinggi Badan (Cm)')" />
                    <x-text-input class="block mt-1 w-full" type="text" name="tinggi_badan" />
                </div>
                <div>
                    <x-input-label :value="__('Berat Badan (Kg)')" />
                    <x-text-input class="block mt-1 w-full" type="text" name="berat_badan" />
                </div>
                <div>
                    <x-input-label :value="__('Alergi Obat')" />
                    <textarea class="block mt-1 w-full rounded-md border-gray-200 shadow" name="alergi_obat" required></textarea>
                </div>
                <div>
                    <x-input-label :value="__('Anamnesa')" />
                    <textarea class="block mt-1 w-full rounded-md border-gray-200 shadow" name="anamnesa" required></textarea>
                </div>
                <div>
                    <x-input-label :value="__('Diagnosa')" />
                    <textarea class="block mt-1 w-full rounded-md border-gray-200 shadow" name="diagnosa" required></textarea>
                </div>
                <div>
                    <x-input-label :value="__('Keterangan')" />
                    <textarea class="block mt-1 w-full rounded-md border-gray-200 shadow" name="keterangan" required></textarea>
                </div>
                <div>
                    <x-input-label :value="__('Resep Obat')" />
                    <textarea class="block mt-1 w-full rounded-md border-gray-200 shadow" name="resep_obat" required></textarea>
                </div>
                <div>
                    <x-bladewind::button can_submit="true" class="w-full rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
                </div>
            </form>


        </div>


    </section>
</x-dashboard-layout>