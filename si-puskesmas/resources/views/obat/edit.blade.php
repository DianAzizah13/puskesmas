<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Obat</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Ubah Obat</p>
        </div>

        <form action="{{route('obat.update', $obat->id)}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            @method('PUT')

            <div>
                <x-input-label :value="__('Nama Obat')" />
                <x-text-input class="block mt-1 w-full" type="text" name="nama_obat" value="{{$obat->nama_obat}}"
                    required />
            </div>
            <div>
                <x-input-label :value="__('Stok')" />
                <x-text-input class="block mt-1 w-full" type="number" name="stok" value="{{$obat->stok}}" required />
            </div>
            <div>
                <x-input-label :value="__('Satuan')" />
                <select name="satuan" class="block mt-1 w-full" required>
                    <option value="" disabled selected>Pilih Satuan</option>
                    <option value="strip">Strip</option>
                    <option value="kapsul">Kapsul</option>
                    <option value="botol">Botol</option>
                    <option value="tube">Tube</option>
                    <option value="ampul">Ampul</option>
                    <option value="sachet">Sachet</option>
                    <option value="suppositoria">Suppositoria</option>
                    <option value="box">Box</option>
                    <option value="tablet">Tablet</option>
                </select>
            </div>
            <div>
                <x-input-label :value="__('Tanggal Kadaluwarsa')" />
                <x-text-input class="block mt-1 w-full" type="date" name="kadaluwarsa" value="{{$obat->kadaluwarsa}}"
                    required />
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan
                </x-bladewind::button>
            </div>
        </form>

    </section>
</x-dashboard-layout>