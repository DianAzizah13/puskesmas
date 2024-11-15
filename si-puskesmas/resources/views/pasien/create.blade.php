<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Pasien</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Tambah Pasien</p>
        </div>

        <form action="{{route('pasien.store')}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            <div>
                <x-input-label :value="__('Nama Pasien')" />
                <x-text-input class="block mt-1 w-full" type="text" name="nama_pasien" required/>
            </div>
            <div>
                <x-input-label :value="__('NIK')" />
                <x-text-input class="block mt-1 w-full" type="number" name="nik" required/>
            </div>
            <div>
                <x-input-label :value="__('Penjamin')" />
                <select class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" name="penjamin" required>
                    <option value="Umum/Asuransi Lain">Umum/Asuransi Lain</option>
                    <option value="BPJS">BPJS Kesehatan</option>
                </select>
            </div>
            <div>
                <x-input-label :value="__('Jenis Kelamin')" />
                <select class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" name="jenis_kelamin" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <x-input-label :value="__('Alamat')" />
                <textarea class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" type="number" name="alamat" required></textarea>
            </div>
            <div>
                <x-input-label :value="__('Telepon')" />
                <x-text-input class="block mt-1 w-full" type="number" name="telepon" required/>
            </div>
            <div>
                <x-input-label :value="__('Tanggal Lahir')" />
                <x-text-input class="block mt-1 w-full " type="date" name="tanggal_lahir" required/>
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
            </div>
        </form>
        
    </section>
</x-dashboard-layout>